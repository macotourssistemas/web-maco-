<?php
declare(strict_types=1);

/**
 * Plantillas HTML de correo (estilos en línea, compatibles con clientes de correo).
 * Paleta Maco Tours: verde #1f7a3d y azul #1e4a8c.
 */

function maco_mail_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Envoltura común: cabecera con marca, contenido y pie.
 */
function maco_mail_layout(string $title, string $contentHtml): string
{
    $title = maco_mail_escape($title);
    $year = gmdate('Y');

    return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$title}</title>
</head>
<body style="margin:0;padding:0;background:#eef2f6;font-family:Arial,Helvetica,sans-serif;color:#1f2937;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#eef2f6;padding:24px 0;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:600px;max-width:92%;background:#ffffff;border-radius:14px;overflow:hidden;box-shadow:0 6px 24px rgba(15,23,42,.08);">
          <tr>
            <td style="background:linear-gradient(135deg,#1f7a3d 0%,#1e4a8c 100%);padding:28px 32px;">
              <span style="display:block;color:#ffffff;font-size:22px;font-weight:bold;letter-spacing:.5px;">MACO TOURS S.A.S.</span>
              <span style="display:block;color:#dbeafe;font-size:13px;margin-top:4px;">Transportes Especiales</span>
            </td>
          </tr>
          <tr>
            <td style="padding:32px;">
              <h1 style="margin:0 0 18px;font-size:20px;color:#0f172a;">{$title}</h1>
              {$contentHtml}
            </td>
          </tr>
          <tr>
            <td style="background:#0f172a;padding:20px 32px;">
              <p style="margin:0;color:#cbd5e1;font-size:12px;line-height:1.6;">
                Maco Tours S.A.S. &mdash; Calle 12 #10-70, Gaira, Santa Marta, Magdalena<br>
                Tel: (605) 429 - 9214 &middot; contacto@transportesmacotours.com<br>
                &copy; {$year} Maco Tours. Todos los derechos reservados.
              </p>
            </td>
          </tr>
        </table>
        <p style="color:#94a3b8;font-size:11px;margin:16px 0 0;">Este es un mensaje automático, por favor no responda directamente si no es necesario.</p>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;
}

/**
 * Correo interno (al buzón de la empresa) con los datos del formulario.
 */
function maco_mail_admin_html(string $reason, string $name, string $email, string $message, string $ip): string
{
    $reason = maco_mail_escape($reason);
    $name = maco_mail_escape($name);
    $email = maco_mail_escape($email);
    $messageHtml = nl2br(maco_mail_escape($message));
    $ip = maco_mail_escape($ip);
    $date = gmdate('Y-m-d H:i:s') . ' UTC';

    $row = static function (string $label, string $value): string {
        return '<tr>'
            . '<td style="padding:8px 12px;background:#f1f5f9;font-weight:bold;font-size:13px;color:#334155;width:130px;border-bottom:1px solid #e2e8f0;">' . $label . '</td>'
            . '<td style="padding:8px 12px;font-size:14px;color:#0f172a;border-bottom:1px solid #e2e8f0;">' . $value . '</td>'
            . '</tr>';
    };

    $content = '<p style="margin:0 0 18px;font-size:14px;color:#475569;">Nuevo mensaje recibido desde el formulario de contacto del sitio web.</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e2e8f0;border-radius:8px;overflow:hidden;margin-bottom:20px;">'
        . $row('Motivo', '<strong style="color:#1e4a8c;">' . $reason . '</strong>')
        . $row('Nombre', $name)
        . $row('Correo', '<a href="mailto:' . $email . '" style="color:#1f7a3d;">' . $email . '</a>')
        . $row('Fecha', $date)
        . $row('IP', $ip)
        . '</table>'
        . '<div style="background:#f8fafc;border-left:4px solid #1f7a3d;padding:14px 16px;border-radius:0 8px 8px 0;">'
        . '<span style="display:block;font-size:12px;text-transform:uppercase;letter-spacing:.5px;color:#64748b;margin-bottom:6px;">Mensaje</span>'
        . '<div style="font-size:14px;line-height:1.6;color:#0f172a;">' . $messageHtml . '</div>'
        . '</div>';

    return maco_mail_layout('Nuevo mensaje de contacto', $content);
}

/**
 * Correo de confirmación que recibe el usuario que escribió.
 */
function maco_mail_confirmation_html(string $reason, string $name, string $message): string
{
    $reason = maco_mail_escape($reason);
    $name = maco_mail_escape($name);
    $messageHtml = nl2br(maco_mail_escape($message));

    $content = '<p style="margin:0 0 16px;font-size:15px;color:#0f172a;">Hola <strong>' . $name . '</strong>,</p>'
        . '<p style="margin:0 0 16px;font-size:14px;line-height:1.6;color:#475569;">'
        . 'Hemos recibido tu solicitud y nuestro equipo te responderá lo antes posible. '
        . 'Gracias por contactar a <strong>Maco Tours</strong>.'
        . '</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e2e8f0;border-radius:8px;overflow:hidden;margin:0 0 20px;">'
        . '<tr><td style="padding:8px 12px;background:#f1f5f9;font-weight:bold;font-size:13px;color:#334155;width:130px;">Motivo</td>'
        . '<td style="padding:8px 12px;font-size:14px;color:#0f172a;">' . $reason . '</td></tr>'
        . '</table>'
        . '<div style="background:#f8fafc;border-left:4px solid #1e4a8c;padding:14px 16px;border-radius:0 8px 8px 0;margin-bottom:22px;">'
        . '<span style="display:block;font-size:12px;text-transform:uppercase;letter-spacing:.5px;color:#64748b;margin-bottom:6px;">Tu mensaje</span>'
        . '<div style="font-size:14px;line-height:1.6;color:#0f172a;">' . $messageHtml . '</div>'
        . '</div>'
        . '<a href="https://transportesmacotours.com" style="display:inline-block;background:#1f7a3d;color:#ffffff;text-decoration:none;font-size:14px;font-weight:bold;padding:12px 24px;border-radius:8px;">Visitar nuestro sitio</a>';

    return maco_mail_layout('Recibimos tu solicitud', $content);
}
