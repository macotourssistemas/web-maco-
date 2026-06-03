import fs from "fs";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const en = JSON.parse(
  fs.readFileSync(path.join(__dirname, "i18n-pages-en.json"), "utf8")
);

const pt = {
  servicios: {
    card1Title: "Transporte empresarial",
    card1Text:
      "O transporte empresarial oferece soluções eficientes para as necessidades de mobilidade da sua empresa. Com foco na pontualidade e no conforto, os nossos serviços garantem a satisfação dos seus colaboradores e dos seus clientes. Dispomos de uma frota moderna e de motoristas profissionais que asseguram que cada viagem seja segura e confortável.",
    card2Title: "Transporte escolar",
    card2Text:
      "O nosso serviço de transporte escolar foi concebido tendo em conta a segurança e o bem-estar dos estudantes. Com motoristas qualificados e veículos equipados com as mais recentes medidas de segurança, oferecemos uma solução fiável para o transporte dos alunos de e para a escola. A sua tranquilidade e a dos pais é a nossa prioridade.",
    card3Title: "Transporte turístico",
    card3Text:
      "Descubra destinos fascinantes com o nosso serviço de transporte turístico. Quer esteja a planear uma viagem em grupo ou uma excursão individual, a nossa equipa está pronta para tornar a sua experiência inesquecível. Com comodidades a bordo e guias experientes, levamo-lo a explorar novos lugares e a viver aventuras emocionantes.",
    feat1Title: "Transporte empresarial: eficiência para o seu negócio",
    feat1Text:
      "O nosso serviço de transporte empresarial oferece eficiência e conforto para a sua empresa. Otimize o tempo dos seus colaboradores com deslocações seguras e pontuais. Com a nossa frota moderna e motoristas profissionais, garantimos que as suas viagens de negócios sejam produtivas e sem preocupações.",
    feat2Title: "Transporte escolar: tranquilidade para pais e estudantes",
    feat2Text:
      "Com o nosso serviço de transporte escolar, proporcionamos tranquilidade aos pais e segurança aos estudantes. Os pais podem confiar que os seus filhos chegarão à escola em segurança e a horas, enquanto os estudantes desfrutam de viagens confortáveis e sem stress. Os nossos motoristas qualificados garantem um transporte fiável e tranquilo.",
    feat3Title: "Transporte turístico: descubra e desfrute sem preocupações",
    feat3Text:
      "Explore novos destinos e viva experiências inesquecíveis com o nosso serviço de transporte turístico. Pode relaxar e desfrutar da viagem enquanto o levamos a descobrir lugares fascinantes. Os nossos guias experientes asseguram que a sua aventura seja segura, confortável e cheia de momentos memoráveis.",
    whyText:
      "Os nossos serviços de transporte foram concebidos para lhe oferecer benefícios tangíveis em cada viagem. Desde optimizar o tempo de trabalho no transporte empresarial até proporcionar segurança e conforto no transporte escolar e criar experiências memoráveis no turismo, comprometemo-nos a tornar as suas viagens produtivas, seguras e agradáveis. Confie em nós para usufruir de um transporte fiável e de qualidade.",
  },
  nosotros: {
    aboutTitle: "Sobre nós",
    aboutHtml:
      "A Transportes Especiales Maco Tours SAS é uma empresa colombiana líder no transporte público. Orgulhamo-nos de oferecer soluções integrais adaptadas a zonas de difícil acesso em todo o território nacional.<br><br>Com vasta experiência, destacamo-nos por enfrentar com sucesso projectos desafiantes. A nossa presença abrange toda a Colômbia, prestando serviços de transporte público que vão além das rotas convencionais.<br><br>No centro do nosso sucesso está uma equipa altamente qualificada e comprometida. Cada membro contribui para a excelência do serviço, assegurando operações eficientes e profissionais em cada viagem.<br><br>O nosso compromisso centra-se não só na eficiência operacional, mas também na compreensão das necessidades específicas dos nossos clientes. Trabalhamos em estreita colaboração consigo para fornecer soluções de transporte adaptadas aos seus requisitos.<br><br>Ao escolher-nos, confia num parceiro comprometido com a satisfação do cliente e a melhoria contínua. Descubra como a Maco Tours pode facilitar as suas deslocações com segurança, fiabilidade e qualidade excepcional.",
    visionTitle: "Visão",
    visionText:
      "Na Transportes Especiales Maco Tours SAS, aspiramos a ser a principal referência no transporte público. Visualizamos um futuro em que a nossa empresa seja sinónimo de inovação, excelência operacional e compromisso inabalável com a satisfação do cliente ao longo dos próximos cinco anos de crescimento contínuo.",
    missionTitle: "Missão",
    missionText:
      "No centro da nossa missão está o compromisso de fornecer soluções de transporte público que superem as expectativas. Esforçamo-nos por compreender profundamente as necessidades específicas dos nossos clientes e adaptar-nos continuamente para superar os desafios de cada projecto, com foco implacável na eficiência, segurança e qualidade em toda a Colômbia.",
    valuesTitle: "Valores",
    valuesHtml:
      "<strong>1. Compromisso:</strong> Comprometemo-nos a superar as expectativas dos nossos clientes e a manter elevados padrões de qualidade em todas as nossas operações.<br><br><strong>2. Inovação:</strong> Abraçamos a inovação para melhorar constantemente, procurando e aplicando novas tecnologias e práticas que aumentem a eficiência dos nossos serviços.<br><br><strong>3. Integridade:</strong> Agimos com honestidade e transparência em todas as nossas interacções, construindo relações baseadas na confiança e no respeito.<br><br><strong>4. Colaboração:</strong> Promovemos um ambiente de trabalho colaborativo em que cada membro da equipa contribui com a sua experiência única para o sucesso colectivo.",
    certified: "Certificado",
    iso45001Text:
      "Sistema de gestão de segurança e saúde no trabalho: reforçamos o nosso compromisso com a protecção da saúde e da segurança no trabalho através de uma sólida política de segurança e saúde ocupacional.",
    iso14001Text:
      "Sistema de gestão ambiental: reforçamos o nosso compromisso com a protecção do ambiente através de uma sólida política ambiental.",
    iso9001Text:
      "Sistema de gestão da qualidade: reforçamos o nosso compromisso com a qualidade através de uma sólida política de gestão da qualidade, demonstrando o nosso foco na excelência de produtos e serviços.",
    docHabilitacion: "Habilitação",
    docRehabilitacion: "Reabilitação",
    docPesv: "Plano estratégico de segurança rodoviária",
    ministry: "Ministério dos Transportes",
    clickHere: "Clique aqui",
  },
  equipo: {
    intro:
      "Na Transportes Especiales Macotours, acreditamos firmemente na importância de cultivar uma cultura organizacional baseada em valores sólidos que orientem as nossas acções e decisões diárias. A nossa equipa multidisciplinar partilha e promove os seguintes valores fundamentais:",
    profTitle: "Profissionalismo",
    profText:
      "Na Macotours, compreendemos que o profissionalismo vai além de cumprir as tarefas atribuídas. Significa manter elevados padrões de conduta em tudo o que fazemos, desde a comunicação com os clientes até ao tratamento dos colegas. Esforçamo-nos por ser referências na nossa indústria, com um compromisso inabalável com a excelência.",
    collabTitle: "Colaboração",
    collabText:
      "Na Macotours, compreendemos que os melhores resultados surgem quando trabalhamos juntos como uma equipa unida. Promovemos uma cultura de colaboração em que cada voz é ouvida e cada contribuição é valorizada. Acreditamos no poder da diversidade de pensamento e de experiências.",
    safetyTitle: "Segurança",
    safetyText:
      "Na Macotours, a segurança é mais do que uma prioridade: é um compromisso inabalável. Levamos muito a sério a responsabilidade de transportar os nossos passageiros de forma segura e fiável. Garantimos que os nossos motoristas estão formados e certificados, que os veículos estão bem mantidos e que as operações cumprem os mais rigorosos padrões de segurança.",
    clientTitle: "Compromisso com o cliente",
    clientText:
      "Na Macotours, compreendemos que os nossos clientes são a base do nosso negócio. Comprometemo-nos a superar constantemente as suas expectativas, prestando um serviço excepcional que não só satisfaz, mas ultrapassa as suas necessidades. Esforçamo-nos por criar experiências de transporte memoráveis e personalizadas.",
    innovTitle: "Inovação",
    innovText:
      "Na Macotours, acreditamos que a inovação é a chave para nos mantermos na vanguarda de uma indústria em constante evolução. Comprometemo-nos a procurar continuamente novas formas de melhorar e optimizar as nossas operações, desde tecnologias de ponta até novas estratégias e abordagens.",
    respectTitle: "Respeito e diversidade",
    respectText:
      "Na Macotours, acreditamos que a diversidade é a nossa força. Valorizamos e respeitamos as diferenças individuais dos nossos colaboradores e clientes, reconhecendo que cada pessoa traz uma perspectiva única e valiosa à equipa. Comprometemo-nos a criar um ambiente inclusivo onde todos se sintam bem-vindos e respeitados.",
  },
  empresarial: {
    intro:
      "Temos o prazer de saber que está a considerar os nossos serviços de transporte empresarial para as necessidades de mobilidade da sua empresa. Segue-se um resumo do procedimento que seguimos para garantir um serviço eficiente e seguro:",
    procedureTitle: "Procedimento de transporte empresarial",
    step1: "Consulta inicial",
    step2: "Análise e proposta",
    step3: "Negociação e acordo",
    step4: "Assinatura do contrato",
    step5: "Implementação do serviço",
    step6: "Acompanhamento e atendimento ao cliente",
    step7: "Avaliação e melhoria contínua",
    processTitle: "Processo de transporte empresarial",
    processIntro:
      "No processo de transporte empresarial, fornecemos soluções de mobilidade personalizadas para as necessidades específicas da sua empresa. Começamos com uma consulta inicial para compreender os seus requisitos e, em seguida:",
    processLi1: "Realizamos uma análise detalhada das opções disponíveis.",
    processLi2: "Negociamos os termos do contrato de forma transparente e justa.",
    processLi3: "Assinamos um contrato que estabelece claramente as responsabilidades de ambas as partes.",
    processLi4: "Implementamos o serviço conforme acordado.",
    processLi5: "Prestamos acompanhamento e apoio contínuos para garantir a sua satisfação.",
    processLi6: "Avaliamos regularmente o serviço e procuramos oportunidades de melhoria.",
    processOutro:
      "O nosso objectivo é fornecer um transporte empresarial fiável e eficiente que contribua para o sucesso do seu negócio. Contacte-nos para mais informações ou para iniciar o processo de contratação.",
  },
  escolar: {
    intro:
      "Temos o prazer de oferecer o nosso serviço de transporte escolar, concebido para garantir a segurança e o conforto dos estudantes no percurso de e para a escola. Detalhamos abaixo o nosso processo:",
    procedureTitle: "Procedimento de transporte escolar",
    step1: "Consulta inicial",
    step2: "Análise de rotas e horários",
    step3: "Acordo de serviços e tarifas",
    step4: "Assinatura do contrato e documentos exigidos",
    step5: "Implementação do serviço",
    step6: "Comunicação e acompanhamento com pais e escola",
    step7: "Avaliação contínua do serviço",
    processTitle: "Processo de transporte escolar",
    processIntro:
      "No nosso serviço de transporte escolar, comprometemo-nos a proporcionar um ambiente seguro e fiável para os estudantes. O nosso processo inclui os seguintes passos:",
    processLi1: "Realizamos uma consulta inicial para compreender as necessidades específicas da sua instituição de ensino.",
    processLi2: "Efectuamos uma análise detalhada das rotas e horários mais adequados para os estudantes.",
    processLi3: "Acordamos os serviços e tarifas que melhor se adaptam aos seus requisitos e orçamento.",
    processLi4: "Assinamos o contrato e completamos os documentos exigidos para formalizar o serviço.",
    processLi5: "Implementamos o serviço conforme os termos acordados, garantindo pontualidade e segurança em cada percurso.",
    processLi6: "Mantemos comunicação aberta e constante com os pais e a instituição de ensino.",
    processLi7: "Avaliamos continuamente o nosso serviço para identificar áreas de melhoria e assegurar os mais elevados padrões de qualidade e segurança.",
    processOutro:
      "O nosso objectivo é fornecer um transporte escolar fiável e de qualidade que dê tranquilidade aos pais e garanta a pontualidade e a segurança dos estudantes.",
    regsTitle: "Normas e obrigações para o transporte escolar",
    reg1: "Contratos para transporte de estudantes.",
    reg2: "Condições técnicas e operacionais na prestação do serviço.",
    reg3: "Obrigações dos estabelecimentos de ensino.",
    reg4: "Obrigações do Ministério da Educação e das Secretarias de Educação.",
    reg5: "Registar os veículos perante a autoridade de trânsito da jurisdição onde o serviço é prestado.",
    reg6: "Cumprir os distintivos e requisitos especiais estabelecidos no Decreto 1079 de 2015.",
    reg7: "Dispor de apólices de seguro de responsabilidade civil contratual e extracontratual válidas.",
    reg8: "Manter os veículos em óptimas condições mecânicas e de segurança.",
  },
  turistico: {
    intro:
      "Temos o prazer de saber que está a considerar os nossos serviços de transporte turístico para explorar e desfrutar dos destinos mais fascinantes. Segue-se um resumo do procedimento que seguimos para garantir uma experiência memorável e segura:",
    procedureTitle: "Procedimento de transporte turístico",
    step1: "Exploração inicial",
    step2: "Planeamento e proposta",
    step3: "Reserva e confirmação",
    step4: "Preparação do itinerário",
    step5: "Implementação do serviço",
    step6: "Acompanhamento e atendimento ao cliente",
    step7: "Avaliação e melhoria contínua",
    processTitle: "Processo de transporte turístico",
    processIntro:
      "No processo de transporte turístico, dedicamo-nos a oferecer experiências de viagem memoráveis para que possa desfrutar ao máximo dos seus destinos favoritos. Começamos com uma exploração inicial para compreender os seus interesses e, em seguida:",
    processLi1: "Planeamos e propomos itinerários personalizados de acordo com as suas preferências.",
    processLi2: "Gerimos reservas e confirmações de forma eficiente para garantir uma experiência sem contratempos.",
    processLi3: "Preparamos um itinerário detalhado com as actividades e locais a visitar durante a viagem.",
    processLi4: "Implementamos o serviço conforme planeado, garantindo o seu conforto e segurança em todo o momento.",
    processLi5: "Prestamos acompanhamento e apoio contínuos para assegurar que a sua experiência seja satisfatória.",
    processLi6: "Avaliamos regularmente o nosso serviço e procuramos formas de o melhorar para experiências ainda mais enriquecedoras.",
    processOutro:
      "O nosso objectivo é fornecer um transporte turístico de qualidade que lhe permita explorar novos lugares e criar memórias inesquecíveis. Contacte-nos para mais informações ou para começar a planear a sua próxima viagem.",
    regsTitle: "Normas e requisitos para o transporte turístico",
    reg1: "Licença de trânsito e/ou cartão de operação válido.",
    reg2: "RNT - Registo Nacional de Turismo.",
    reg3: "Certificado de revisão técnico-mecânica e de gases válido.",
    reg4: "Formato Único do Contrato (FUEC).",
    reg5: "Carta de condução para veículo de serviço público nas categorias C1 ou C2, conforme aplicável.",
    reg6: "Seguro Obrigatório de Acidentes de Trânsito (SOAT) válido.",
    reg7: "Documento de identidade do motorista vinculado no FUEC.",
    reg8: "Apólices de responsabilidade civil extracontratual e contratual válidas.",
  },
  privacidad: {
    pageHeader: "Política de privacidade",
    intro:
      "Na Transportes Maco Tours, estamos comprometidos com a privacidade dos nossos utilizadores. Esta Política de Privacidade descreve como recolhemos, utilizamos e protegemos as informações pessoais obtidas através do nosso site e de outros canais de comunicação.",
    collect1:
      "Informações de contacto, como nome, endereço de e-mail e número de telefone, fornecidas através de formulários de contacto ou subscrições de newsletters.",
    collect2:
      "Informações de pagamento, como dados de cartão de crédito ou débito, fornecidas para processar pagamentos de serviços.",
    collect3:
      "Informações demográficas, como localização geográfica, que podem ser recolhidas para fins de análise e melhoria de serviços.",
    noCookies:
      "É importante salientar que não recolhemos informações pessoais automaticamente através de cookies ou outras tecnologias de rastreio.",
    useTitle: "Utilização da informação",
    useIntro: "As informações pessoais que recolhemos são utilizadas para os seguintes fins:",
    use1: "Responder a consultas e pedidos dos utilizadores.",
    use2: "Processar pagamentos de serviços contratados.",
    use3: "Enviar comunicações de marketing e newsletters, se o utilizador tiver optado por as receber.",
    use4: "Melhorar os nossos produtos e serviços através de análise de dados e feedback dos utilizadores.",
    discloseTitle: "Divulgação da informação",
    discloseIntro:
      "Na Transportes Maco Tours, não vendemos, alugamos nem partilhamos informações pessoais com terceiros, excepto nas seguintes circunstâncias:",
    disclose1:
      "Quando necessário para prestar os serviços solicitados pelo utilizador, como o processamento de pagamentos.",
    disclose2:
      "Para cumprir obrigações legais, como responder a ordens judiciais ou requisitos governamentais.",
    disclose3: "Com o consentimento expresso do utilizador.",
    securityTitle: "Segurança da informação",
    securityText:
      "Na Transportes Maco Tours, comprometemo-nos a proteger as informações pessoais dos nossos utilizadores através de medidas de segurança adequadas, incluindo salvaguardas físicas, electrónicas e administrativas para prevenir acesso não autorizado, divulgação, uso indevido ou alteração de informações pessoais.",
    thirdTitle: "Ligações a terceiros",
    thirdText:
      "O nosso site pode conter ligações a sites de terceiros que não estão sob o nosso controlo. Não somos responsáveis pelas práticas de privacidade ou pelo conteúdo desses sites. Recomendamos rever as suas políticas de privacidade antes de fornecer qualquer informação pessoal.",
    changesTitle: "Alterações a esta política de privacidade",
    changesText:
      "A Transportes Maco Tours reserva-se o direito de actualizar esta Política de Privacidade a qualquer momento. As alterações significativas serão notificadas através da sua publicação aqui. Encorajamos os utilizadores a rever periodicamente esta página para se manterem informados sobre como protegemos as informações pessoais que recolhemos.",
  },
};

const it = {
  servicios: {
    card1Title: "Trasporto aziendale",
    card1Text:
      "Il trasporto aziendale offre soluzioni efficienti per le esigenze di mobilità della tua azienda. Con un focus su puntualità e comfort, i nostri servizi garantiscono la soddisfazione dei dipendenti e dei clienti. Disponiamo di una flotta moderna e autisti professionali che assicurano viaggi sicuri e confortevoli.",
    card2Title: "Trasporto scolastico",
    card2Text:
      "Il nostro servizio di trasporto scolastico è pensato per la sicurezza e il benessere degli studenti. Con autisti qualificati e veicoli dotati delle ultime misure di sicurezza, offriamo una soluzione affidabile per il trasporto da e verso la scuola. La tua tranquillità e quella dei genitori è la nostra priorità.",
    card3Title: "Trasporto turistico",
    card3Text:
      "Scopri destinazioni affascinanti con il nostro servizio di trasporto turistico. Che tu stia pianificando un viaggio di gruppo o un'escursione individuale, il nostro team è pronto a rendere la tua esperienza indimenticabile. Con comfort a bordo e guide esperte, ti porteremo a esplorare nuovi luoghi e vivere avventure emozionanti.",
    feat1Title: "Trasporto aziendale: efficienza per la tua attività",
    feat1Text:
      "Il nostro servizio di trasporto aziendale offre efficienza e comfort per la tua azienda. Ottimizza il tempo dei dipendenti con trasferimenti sicuri e puntuali. Con la nostra flotta moderna e autisti professionali, garantiamo viaggi di lavoro produttivi e senza preoccupazioni.",
    feat2Title: "Trasporto scolastico: tranquillità per genitori e studenti",
    feat2Text:
      "Con il nostro servizio di trasporto scolastico offriamo tranquillità ai genitori e sicurezza agli studenti. I genitori possono fidarsi che i figli arrivino a scuola in sicurezza e in orario, mentre gli studenti godono di viaggi comodi e senza stress. I nostri autisti qualificati garantiscono trasferimenti affidabili e sereni.",
    feat3Title: "Trasporto turistico: scopri e goditi senza preoccupazioni",
    feat3Text:
      "Esplora nuove destinazioni e vivi esperienze indimenticabili con il nostro servizio di trasporto turistico. Puoi rilassarti e goderti il viaggio mentre ti portiamo a scoprire luoghi affascinanti. Le nostre guide esperte assicureranno un'avventura sicura, confortevole e piena di momenti memorabili.",
    whyText:
      "I nostri servizi di trasporto sono progettati per offrirti benefici concreti in ogni viaggio. Dall'ottimizzazione del tempo lavorativo nel trasporto aziendale alla sicurezza e al comfort nel trasporto scolastico, fino a esperienze memorabili nel turismo, ci impegniamo a rendere i tuoi viaggi produttivi, sicuri e piacevoli. Affidati a noi per un trasporto affidabile e di qualità.",
  },
  nosotros: {
    aboutTitle: "Chi siamo",
    aboutHtml:
      "Transportes Especiales Maco Tours SAS è un'azienda colombiana leader nel trasporto pubblico. Siamo orgogliosi di offrire soluzioni integrate adattate alle aree di difficile accesso su tutto il territorio nazionale.<br><br>Con una vasta esperienza, ci distinguiamo per affrontare con successo progetti impegnativi. La nostra presenza copre tutta la Colombia, fornendo servizi di trasporto pubblico che vanno oltre le rotte convenzionali.<br><br>Al centro del nostro successo c'è un team altamente qualificato e impegnato. Ogni membro contribuisce all'eccellenza del servizio, garantendo operazioni efficienti e professionali in ogni viaggio.<br><br>Il nostro impegno non si concentra solo sull'efficienza operativa, ma anche sulla comprensione delle esigenze specifiche dei clienti. Lavoriamo a stretto contatto con te per fornire soluzioni di trasporto su misura.<br><br>Scegliendoci, ti affidi a un partner impegnato nella soddisfazione del cliente e nel miglioramento continuo. Scopri come Maco Tours può facilitare i tuoi spostamenti con sicurezza, affidabilità e qualità eccezionale.",
    visionTitle: "Visione",
    visionText:
      "In Transportes Especiales Maco Tours SAS, aspiriamo a essere il principale riferimento nel trasporto pubblico. Immaginiamo un futuro in cui la nostra azienda sia sinonimo di innovazione, eccellenza operativa e impegno incrollabile verso la soddisfazione del cliente nei prossimi cinque anni di crescita continua.",
    missionTitle: "Missione",
    missionText:
      "Al centro della nostra missione c'è l'impegno a fornire soluzioni di trasporto pubblico che superino le aspettative. Ci sforziamo di comprendere a fondo le esigenze specifiche dei clienti e di adattarci continuamente per superare le sfide di ogni progetto, con un focus implacabile su efficienza, sicurezza e qualità in tutta la Colombia.",
    valuesTitle: "Valori",
    valuesHtml:
      "<strong>1. Impegno:</strong> Ci impegniamo a superare le aspettative dei nostri clienti e a mantenere elevati standard di qualità in tutte le nostre operazioni.<br><br><strong>2. Innovazione:</strong> Abbracciamo l'innovazione per migliorare costantemente, cercando e applicando nuove tecnologie e pratiche che aumentino l'efficienza dei nostri servizi.<br><br><strong>3. Integrità:</strong> Agiamo con onestà e trasparenza in tutte le nostre interazioni, costruendo relazioni basate sulla fiducia e sul rispetto.<br><br><strong>4. Collaborazione:</strong> Promuoviamo un ambiente di lavoro collaborativo in cui ogni membro del team contribuisce con la propria esperienza unica al successo collettivo.",
    certified: "Certificato",
    iso45001Text:
      "Sistema di gestione della salute e sicurezza sul lavoro: rafforziamo il nostro impegno per la protezione della salute e della sicurezza sul lavoro attraverso una solida politica di sicurezza e salute occupazionale.",
    iso14001Text:
      "Sistema di gestione ambientale: rafforziamo il nostro impegno per la protezione dell'ambiente attraverso una solida politica ambientale.",
    iso9001Text:
      "Sistema di gestione della qualità: rafforziamo il nostro impegno per la qualità attraverso una solida politica di gestione della qualità, dimostrando il nostro focus sull'eccellenza di prodotti e servizi.",
    docHabilitacion: "Abilitazione",
    docRehabilitacion: "Riabilitazione",
    docPesv: "Piano strategico di sicurezza stradale",
    ministry: "Ministero dei Trasporti",
    clickHere: "Clicca qui",
  },
  equipo: {
    intro:
      "In Transportes Especiales Macotours, crediamo fermamente nell'importanza di coltivare una cultura organizzativa basata su valori solidi che guidino le nostre azioni e decisioni quotidiane. Il nostro team multidisciplinare condivide e promuove i seguenti valori fondamentali:",
    profTitle: "Professionalità",
    profText:
      "In Macotours, comprendiamo che la professionalità va oltre il semplice adempimento dei compiti assegnati. Significa mantenere elevati standard di condotta in tutto ciò che facciamo, dalla comunicazione con i clienti al trattamento dei colleghi. Ci sforziamo di essere modelli di riferimento nel nostro settore, con un impegno incrollabile verso l'eccellenza.",
    collabTitle: "Collaborazione",
    collabText:
      "In Macotours, comprendiamo che i migliori risultati arrivano quando lavoriamo insieme come un team unito. Promuoviamo una cultura di collaborazione in cui ogni voce è ascoltata e ogni contributo è valorizzato. Crediamo nel potere della diversità di pensiero e di esperienze.",
    safetyTitle: "Sicurezza",
    safetyText:
      "In Macotours, la sicurezza è più di una priorità: è un impegno incrollabile. Prendiamo molto sul serio la responsabilità di trasportare i nostri passeggeri in modo sicuro e affidabile. Ci assicuriamo che gli autisti siano formati e certificati, che i veicoli siano ben mantenuti e che le operazioni rispettino i più rigorosi standard di sicurezza.",
    clientTitle: "Impegno verso il cliente",
    clientText:
      "In Macotours, comprendiamo che i nostri clienti sono la pietra angolare del nostro business. Ci impegniamo a superare costantemente le loro aspettative, fornendo un servizio eccezionale che non solo soddisfa, ma supera le loro esigenze. Ci sforziamo di creare esperienze di trasporto memorabili e personalizzate.",
    innovTitle: "Innovazione",
    innovText:
      "In Macotours, crediamo che l'innovazione sia la chiave per restare all'avanguardia in un settore in continua evoluzione. Ci impegniamo a cercare costantemente nuovi modi per migliorare e ottimizzare le nostre operazioni, dalle tecnologie all'avanguardia a nuove strategie e approcci.",
    respectTitle: "Rispetto e diversità",
    respectText:
      "In Macotours, crediamo che la diversità sia la nostra forza. Valorizziamo e rispettiamo le differenze individuali dei nostri dipendenti e clienti, riconoscendo che ogni persona porta una prospettiva unica e preziosa al team. Ci impegniamo a creare un ambiente inclusivo in cui tutti si sentano benvenuti e rispettati.",
  },
  empresarial: {
    intro:
      "Siamo lieti che tu stia considerando i nostri servizi di trasporto aziendale per le esigenze di mobilità della tua azienda. Di seguito un riepilogo della procedura che seguiamo per garantire un servizio efficiente e sicuro:",
    procedureTitle: "Procedura di trasporto aziendale",
    step1: "Consultazione iniziale",
    step2: "Analisi e proposta",
    step3: "Negoziazione e accordo",
    step4: "Firma del contratto",
    step5: "Implementazione del servizio",
    step6: "Monitoraggio e assistenza clienti",
    step7: "Valutazione e miglioramento continuo",
    processTitle: "Processo di trasporto aziendale",
    processIntro:
      "Nel processo di trasporto aziendale, forniamo soluzioni di mobilità personalizzate per le esigenze specifiche della tua azienda. Iniziamo con una consultazione iniziale per comprendere i requisiti e poi:",
    processLi1: "Conduciamo un'analisi dettagliata delle opzioni disponibili.",
    processLi2: "Negoziamo i termini del contratto in modo trasparente ed equo.",
    processLi3: "Firmiamo un contratto che stabilisce chiaramente le responsabilità di entrambe le parti.",
    processLi4: "Implementiamo il servizio come concordato.",
    processLi5: "Forniamo monitoraggio e supporto continui per garantire la tua soddisfazione.",
    processLi6: "Valutiamo regolarmente il servizio e cerchiamo opportunità di miglioramento.",
    processOutro:
      "Il nostro obiettivo è fornire un trasporto aziendale affidabile ed efficiente che contribuisca al successo della tua attività. Contattaci per maggiori informazioni o per avviare il processo di assunzione.",
  },
  escolar: {
    intro:
      "Siamo lieti di offrire il nostro servizio di trasporto scolastico, progettato per garantire sicurezza e comfort agli studenti nel tragitto da e verso la scuola. Di seguito dettagliamo il nostro processo:",
    procedureTitle: "Procedura di trasporto scolastico",
    step1: "Consultazione iniziale",
    step2: "Analisi di percorsi e orari",
    step3: "Accordo su servizi e tariffe",
    step4: "Firma del contratto e documenti richiesti",
    step5: "Implementazione del servizio",
    step6: "Comunicazione e monitoraggio con genitori e scuola",
    step7: "Valutazione continua del servizio",
    processTitle: "Processo di trasporto scolastico",
    processIntro:
      "Nel nostro servizio di trasporto scolastico, ci impegniamo a fornire un ambiente sicuro e affidabile per gli studenti. Il nostro processo include i seguenti passaggi:",
    processLi1: "Conduciamo una consultazione iniziale per comprendere le esigenze specifiche della tua istituzione educativa.",
    processLi2: "Effettuiamo un'analisi dettagliata dei percorsi e degli orari più adatti per gli studenti.",
    processLi3: "Concordiamo servizi e tariffe che meglio si adattano ai requisiti e al budget.",
    processLi4: "Firmiamo il contratto e completiamo i documenti richiesti per formalizzare il servizio.",
    processLi5: "Implementiamo il servizio secondo i termini concordati, garantendo puntualità e sicurezza in ogni tragitto.",
    processLi6: "Manteniamo una comunicazione aperta e costante con genitori e istituzione educativa.",
    processLi7: "Valutiamo continuamente il nostro servizio per identificare aree di miglioramento e garantire i più alti standard di qualità e sicurezza.",
    processOutro:
      "Il nostro obiettivo è fornire un trasporto scolastico affidabile e di qualità che dia tranquillità ai genitori e garantisca puntualità e sicurezza agli studenti.",
    regsTitle: "Normative e obblighi per il trasporto scolastico",
    reg1: "Contratti per il trasporto degli studenti.",
    reg2: "Condizioni tecniche e operative nella prestazione del servizio.",
    reg3: "Obblighi degli istituti scolastici.",
    reg4: "Obblighi del Ministero dell'Istruzione e delle Segreterie dell'Istruzione.",
    reg5: "Registrare i veicoli presso l'autorità del traffico della giurisdizione in cui viene prestato il servizio.",
    reg6: "Rispettare i contrassegni e i requisiti speciali stabiliti dal Decreto 1079 del 2015.",
    reg7: "Disporre di polizze assicurative di responsabilità civile contrattuale ed extracontrattuale valide.",
    reg8: "Mantenere i veicoli in condizioni meccaniche e di sicurezza ottimali.",
  },
  turistico: {
    intro:
      "Siamo lieti che tu stia considerando i nostri servizi di trasporto turistico per esplorare e godere delle destinazioni più affascinanti. Di seguito un riepilogo della procedura che seguiamo per garantire un'esperienza memorabile e sicura:",
    procedureTitle: "Procedura di trasporto turistico",
    step1: "Esplorazione iniziale",
    step2: "Pianificazione e proposta",
    step3: "Prenotazione e conferma",
    step4: "Preparazione dell'itinerario",
    step5: "Implementazione del servizio",
    step6: "Monitoraggio e assistenza clienti",
    step7: "Valutazione e miglioramento continuo",
    processTitle: "Processo di trasporto turistico",
    processIntro:
      "Nel processo di trasporto turistico, ci dedichiamo a offrire esperienze di viaggio memorabili affinché tu possa godere appieno delle tue destinazioni preferite. Iniziamo con un'esplorazione iniziale per comprendere i tuoi interessi e poi:",
    processLi1: "Pianifichiamo e proponiamo itinerari personalizzati in base alle tue preferenze.",
    processLi2: "Gestiamo prenotazioni e conferme in modo efficiente per garantire un'esperienza senza intoppi.",
    processLi3: "Prepariamo un itinerario dettagliato con le attività e i luoghi da visitare durante il viaggio.",
    processLi4: "Implementiamo il servizio come pianificato, garantendo comfort e sicurezza in ogni momento.",
    processLi5: "Forniamo monitoraggio e supporto continui per assicurarci che la tua esperienza sia soddisfacente.",
    processLi6: "Valutiamo regolarmente il nostro servizio e cerchiamo modi per migliorarlo per esperienze ancora più arricchenti.",
    processOutro:
      "Il nostro obiettivo è fornire un trasporto turistico di qualità che ti permetta di esplorare nuovi luoghi e creare ricordi indimenticabili. Contattaci per maggiori informazioni o per iniziare a pianificare il tuo prossimo viaggio.",
    regsTitle: "Normative e requisiti per il trasporto turistico",
    reg1: "Licenza di circolazione e/o carta di esercizio valida.",
    reg2: "RNT - Registro Nazionale del Turismo.",
    reg3: "Certificato di revisione tecnico-meccanica e gas valido.",
    reg4: "Formato Unico del Contratto (FUEC).",
    reg5: "Patente di guida per veicolo di servizio pubblico nelle categorie C1 o C2, se applicabile.",
    reg6: "Assicurazione Obbligatoria per Incidenti Stradali (SOAT) valida.",
    reg7: "Documento d'identità dell'autista collegato nel FUEC.",
    reg8: "Polizze di responsabilità civile extracontrattuale e contrattuale valide.",
  },
  privacidad: {
    pageHeader: "Informativa sulla privacy",
    intro:
      "In Transportes Maco Tours, siamo impegnati nella privacy dei nostri utenti. Questa Informativa sulla Privacy descrive come raccogliamo, utilizziamo e proteggiamo le informazioni personali ottenute attraverso il nostro sito web e altri canali di comunicazione.",
    collect1:
      "Informazioni di contatto come nome, indirizzo e-mail e numero di telefono fornite tramite moduli di contatto o iscrizioni alle newsletter.",
    collect2:
      "Informazioni di pagamento come dati di carta di credito o debito forniti per elaborare i pagamenti dei servizi.",
    collect3:
      "Informazioni demografiche come la posizione geografica che possono essere raccolte per analisi e miglioramento dei servizi.",
    noCookies:
      "È importante sottolineare che non raccogliamo automaticamente informazioni personali tramite cookie o altre tecnologie di tracciamento.",
    useTitle: "Utilizzo delle informazioni",
    useIntro: "Le informazioni personali che raccogliamo sono utilizzate per i seguenti scopi:",
    use1: "Rispondere a richieste e domande degli utenti.",
    use2: "Elaborare i pagamenti per i servizi contrattati.",
    use3: "Inviare comunicazioni di marketing e newsletter se l'utente ha scelto di riceverle.",
    use4: "Migliorare i nostri prodotti e servizi attraverso analisi dei dati e feedback degli utenti.",
    discloseTitle: "Divulgazione delle informazioni",
    discloseIntro:
      "In Transportes Maco Tours, non vendiamo, affittiamo né condividiamo informazioni personali con terze parti, salvo nelle seguenti circostanze:",
    disclose1:
      "Quando necessario per fornire i servizi richiesti dall'utente, come l'elaborazione dei pagamenti.",
    disclose2:
      "Per adempiere agli obblighi legali, come rispondere a ordini giudiziari o richieste governative.",
    disclose3: "Con il consenso espresso dell'utente.",
    securityTitle: "Sicurezza delle informazioni",
    securityText:
      "In Transportes Maco Tours, ci impegniamo a proteggere le informazioni personali dei nostri utenti attraverso misure di sicurezza appropriate, incluse salvaguardie fisiche, elettroniche e amministrative per prevenire accesso non autorizzato, divulgazione, uso improprio o alterazione delle informazioni personali.",
    thirdTitle: "Link a terze parti",
    thirdText:
      "Il nostro sito web può contenere link a siti di terze parti che non sono sotto il nostro controllo. Non siamo responsabili delle pratiche sulla privacy o dei contenuti di questi siti. Consigliamo di rivedere le loro informative sulla privacy prima di fornire informazioni personali.",
    changesTitle: "Modifiche a questa informativa sulla privacy",
    changesText:
      "Transportes Maco Tours si riserva il diritto di aggiornare questa Informativa sulla Privacy in qualsiasi momento. Le modifiche significative saranno comunicate pubblicandole qui. Incoraggiamo gli utenti a rivedere periodicamente questa pagina per rimanere informati su come proteggiamo le informazioni personali che raccogliamo.",
  },
};

const fr = {
  servicios: {
    card1Title: "Transport d'entreprise",
    card1Text:
      "Le transport d'entreprise offre des solutions efficaces pour les besoins de mobilité de votre société. Axés sur la ponctualité et le confort, nos services garantissent la satisfaction de vos employés et de vos clients. Nous disposons d'une flotte moderne et de chauffeurs professionnels qui assurent des trajets sûrs et confortables.",
    card2Title: "Transport scolaire",
    card2Text:
      "Notre service de transport scolaire est conçu pour la sécurité et le bien-être des élèves. Avec des chauffeurs qualifiés et des véhicules équipés des dernières mesures de sécurité, nous offrons une solution fiable pour le transport des élèves vers et depuis l'école. Votre tranquillité d'esprit et celle des parents est notre priorité.",
    card3Title: "Transport touristique",
    card3Text:
      "Découvrez des destinations fascinantes avec notre service de transport touristique. Que vous planifiiez un voyage en groupe ou une excursion individuelle, notre équipe est prête à rendre votre expérience inoubliable. Avec des commodités à bord et des guides experts, nous vous emmènerons explorer de nouveaux lieux et vivre des aventures passionnantes.",
    feat1Title: "Transport d'entreprise : efficacité pour votre activité",
    feat1Text:
      "Notre service de transport d'entreprise offre efficacité et confort pour votre société. Optimisez le temps de vos employés avec des transferts sûrs et ponctuels. Avec notre flotte moderne et nos chauffeurs professionnels, nous garantissons des voyages d'affaires productifs et sans souci.",
    feat2Title: "Transport scolaire : tranquillité pour parents et élèves",
    feat2Text:
      "Avec notre service de transport scolaire, nous offrons la tranquillité aux parents et la sécurité aux élèves. Les parents peuvent avoir confiance que leurs enfants arriveront à l'école en sécurité et à l'heure, tandis que les élèves profitent de trajets confortables et sans stress. Nos chauffeurs qualifiés assurent des transferts fiables et sereins.",
    feat3Title: "Transport touristique : découvrez et profitez sans souci",
    feat3Text:
      "Explorez de nouvelles destinations et vivez des expériences inoubliables avec notre service de transport touristique. Vous pouvez vous détendre et profiter du voyage pendant que nous vous emmenons découvrir des lieux fascinants. Nos guides experts veilleront à ce que votre aventure soit sûre, confortable et pleine de moments mémorables.",
    whyText:
      "Nos services de transport sont conçus pour vous offrir des avantages concrets à chaque voyage. De l'optimisation du temps de travail dans le transport d'entreprise à la sécurité et au confort dans le transport scolaire, en passant par des expériences mémorables en tourisme, nous nous engageons à rendre vos voyages productifs, sûrs et agréables. Faites-nous confiance pour un transport fiable et de qualité.",
  },
  nosotros: {
    aboutTitle: "À propos de nous",
    aboutHtml:
      "Transportes Especiales Maco Tours SAS est une entreprise colombienne leader dans les transports publics. Nous sommes fiers d'offrir des solutions intégrales adaptées aux zones difficiles d'accès sur tout le territoire national.<br><br>Avec une vaste expérience, nous nous distinguons par la réussite de projets exigeants. Notre présence couvre toute la Colombie, fournissant des services de transport public qui vont au-delà des itinéraires conventionnels.<br><br>Au cœur de notre succès se trouve une équipe hautement qualifiée et engagée. Chaque membre contribue à l'excellence du service, assurant des opérations efficaces et professionnelles à chaque voyage.<br><br>Notre engagement ne se limite pas à l'efficacité opérationnelle, mais aussi à la compréhension des besoins spécifiques de nos clients. Nous travaillons en étroite collaboration avec vous pour fournir des solutions de transport adaptées.<br><br>En nous choisissant, vous faites confiance à un partenaire engagé envers la satisfaction client et l'amélioration continue. Découvrez comment Maco Tours peut faciliter vos déplacements avec sécurité, fiabilité et une qualité exceptionnelle.",
    visionTitle: "Vision",
    visionText:
      "Chez Transportes Especiales Maco Tours SAS, nous aspirons à être la principale référence dans les transports publics. Nous envisageons un avenir où notre entreprise soit synonyme d'innovation, d'excellence opérationnelle et d'engagement inébranlable envers la satisfaction client sur les cinq prochaines années de croissance continue.",
    missionTitle: "Mission",
    missionText:
      "Au cœur de notre mission se trouve l'engagement de fournir des solutions de transport public qui dépassent les attentes. Nous nous efforçons de comprendre en profondeur les besoins spécifiques de nos clients et de nous adapter continuellement pour relever les défis de chaque projet, avec un focus implacable sur l'efficacité, la sécurité et la qualité dans toute la Colombie.",
    valuesTitle: "Valeurs",
    valuesHtml:
      "<strong>1. Engagement :</strong> Nous nous engageons à dépasser les attentes de nos clients et à maintenir des normes de qualité élevées dans toutes nos opérations.<br><br><strong>2. Innovation :</strong> Nous embrassons l'innovation pour nous améliorer constamment, en recherchant et appliquant de nouvelles technologies et pratiques qui renforcent l'efficacité de nos services.<br><br><strong>3. Intégrité :</strong> Nous agissons avec honnêteté et transparence dans toutes nos interactions, en construisant des relations basées sur la confiance et le respect.<br><br><strong>4. Collaboration :</strong> Nous favorisons un environnement de travail collaboratif où chaque membre de l'équipe apporte son expérience unique au succès collectif.",
    certified: "Certifié",
    iso45001Text:
      "Système de management de la santé et de la sécurité au travail : nous renforçons notre engagement envers la protection de la santé et de la sécurité au travail grâce à une politique solide de sécurité et santé au travail.",
    iso14001Text:
      "Système de management environnemental : nous renforçons notre engagement envers la protection de l'environnement grâce à une politique environnementale solide.",
    iso9001Text:
      "Système de management de la qualité : nous renforçons notre engagement envers la qualité grâce à une politique de management de la qualité solide, démontrant notre orientation vers l'excellence des produits et services.",
    docHabilitacion: "Habilitation",
    docRehabilitacion: "Réhabilitation",
    docPesv: "Plan stratégique de sécurité routière",
    ministry: "Ministère des Transports",
    clickHere: "Cliquez ici",
  },
  equipo: {
    intro:
      "Chez Transportes Especiales Macotours, nous croyons fermement à l'importance de cultiver une culture organisationnelle basée sur des valeurs solides qui guident nos actions et décisions quotidiennes. Notre équipe multidisciplinaire partage et promeut les valeurs fondamentales suivantes :",
    profTitle: "Professionnalisme",
    profText:
      "Chez Macotours, nous comprenons que le professionnalisme va au-delà de l'accomplissement des tâches assignées. Cela signifie maintenir des normes de conduite élevées dans tout ce que nous faisons, de la communication avec les clients au traitement des collègues. Nous nous efforçons d'être des modèles dans notre industrie, avec un engagement inébranlable envers l'excellence.",
    collabTitle: "Collaboration",
    collabText:
      "Chez Macotours, nous comprenons que les meilleurs résultats viennent lorsque nous travaillons ensemble comme une équipe unie. Nous favorisons une culture de collaboration où chaque voix est entendue et chaque contribution est valorisée. Nous croyons au pouvoir de la diversité de pensée et d'expériences.",
    safetyTitle: "Sécurité",
    safetyText:
      "Chez Macotours, la sécurité est plus qu'une priorité : c'est un engagement inébranlable. Nous prenons très au sérieux la responsabilité de transporter nos passagers en toute sécurité et de manière fiable. Nous veillons à ce que nos chauffeurs soient formés et certifiés, que nos véhicules soient bien entretenus et que nos opérations respectent les normes de sécurité les plus strictes.",
    clientTitle: "Engagement envers le client",
    clientText:
      "Chez Macotours, nous comprenons que nos clients sont la pierre angulaire de notre activité. Nous nous engageons à dépasser constamment leurs attentes, en fournissant un service exceptionnel qui non seulement répond, mais dépasse leurs besoins. Nous nous efforçons de créer des expériences de transport mémorables et personnalisées.",
    innovTitle: "Innovation",
    innovText:
      "Chez Macotours, nous croyons que l'innovation est la clé pour rester à l'avant-garde d'une industrie en constante évolution. Nous nous engageons à rechercher constamment de nouvelles façons d'améliorer et d'optimiser nos opérations, des technologies de pointe aux nouvelles stratégies et approches.",
    respectTitle: "Respect et diversité",
    respectText:
      "Chez Macotours, nous croyons que la diversité est notre force. Nous valorisons et respectons les différences individuelles de nos employés et clients, reconnaissant que chaque personne apporte une perspective unique et précieuse à l'équipe. Nous nous engageons à créer un environnement inclusif où chacun se sent bienvenu et respecté.",
  },
  empresarial: {
    intro:
      "Nous sommes heureux que vous envisagiez nos services de transport d'entreprise pour les besoins de mobilité de votre société. Voici un résumé de la procédure que nous suivons pour garantir un service efficace et sûr :",
    procedureTitle: "Procédure de transport d'entreprise",
    step1: "Consultation initiale",
    step2: "Analyse et proposition",
    step3: "Négociation et accord",
    step4: "Signature du contrat",
    step5: "Mise en œuvre du service",
    step6: "Suivi et service client",
    step7: "Évaluation et amélioration continue",
    processTitle: "Processus de transport d'entreprise",
    processIntro:
      "Dans le processus de transport d'entreprise, nous fournissons des solutions de mobilité personnalisées pour les besoins spécifiques de votre société. Nous commençons par une consultation initiale pour comprendre vos exigences, puis :",
    processLi1: "Nous réalisons une analyse détaillée des options disponibles.",
    processLi2: "Nous négocions les termes du contrat de manière transparente et équitable.",
    processLi3: "Nous signons un contrat qui établit clairement les responsabilités des deux parties.",
    processLi4: "Nous mettons en œuvre le service comme convenu.",
    processLi5: "Nous fournissons un suivi et un soutien continus pour garantir votre satisfaction.",
    processLi6: "Nous évaluons régulièrement le service et recherchons des opportunités d'amélioration.",
    processOutro:
      "Notre objectif est de fournir un transport d'entreprise fiable et efficace qui contribue au succès de votre activité. Contactez-nous pour plus d'informations ou pour démarrer le processus d'embauche.",
  },
  escolar: {
    intro:
      "Nous sommes heureux d'offrir notre service de transport scolaire, conçu pour garantir la sécurité et le confort des élèves sur leur trajet vers et depuis l'école. Voici notre processus de transport scolaire :",
    procedureTitle: "Procédure de transport scolaire",
    step1: "Consultation initiale",
    step2: "Analyse des itinéraires et horaires",
    step3: "Accord sur les services et tarifs",
    step4: "Signature du contrat et documents requis",
    step5: "Mise en œuvre du service",
    step6: "Communication et suivi avec parents et école",
    step7: "Évaluation continue du service",
    processTitle: "Processus de transport scolaire",
    processIntro:
      "Dans notre service de transport scolaire, nous nous engageons à fournir un environnement sûr et fiable pour les élèves. Notre processus comprend les étapes suivantes :",
    processLi1: "Nous menons une consultation initiale pour comprendre les besoins spécifiques de votre établissement scolaire.",
    processLi2: "Nous réalisons une analyse détaillée des itinéraires et horaires les plus adaptés pour les élèves.",
    processLi3: "Nous convenons des services et tarifs qui correspondent le mieux à vos exigences et budget.",
    processLi4: "Nous signons le contrat et complétons les documents requis pour formaliser le service.",
    processLi5: "Nous mettons en œuvre le service selon les termes convenus, garantissant ponctualité et sécurité à chaque trajet.",
    processLi6: "Nous maintenons une communication ouverte et constante avec les parents et l'établissement scolaire.",
    processLi7: "Nous évaluons continuellement notre service pour identifier les domaines d'amélioration et assurer les plus hauts standards de qualité et de sécurité.",
    processOutro:
      "Notre objectif est de fournir un transport scolaire fiable et de qualité qui rassure les parents et garantit la ponctualité et la sécurité des élèves.",
    regsTitle: "Réglementations et obligations pour le transport scolaire",
    reg1: "Contrats pour le transport des élèves.",
    reg2: "Conditions techniques et opérationnelles dans la prestation du service.",
    reg3: "Obligations des établissements scolaires.",
    reg4: "Obligations du Ministère de l'Éducation et des Secrétariats de l'Éducation.",
    reg5: "Immatriculer les véhicules auprès de l'autorité de circulation de la juridiction où le service est presté.",
    reg6: "Respecter les marquages et exigences spéciales établis par le Décret 1079 de 2015.",
    reg7: "Disposer de polices d'assurance responsabilité civile contractuelle et extracontractuelle valides.",
    reg8: "Maintenir les véhicules en conditions mécaniques et de sécurité optimales.",
  },
  turistico: {
    intro:
      "Nous sommes heureux que vous envisagiez nos services de transport touristique pour explorer et profiter des destinations les plus fascinantes. Voici un résumé de la procédure que nous suivons pour garantir une expérience mémorable et sûre :",
    procedureTitle: "Procédure de transport touristique",
    step1: "Exploration initiale",
    step2: "Planification et proposition",
    step3: "Réservation et confirmation",
    step4: "Préparation de l'itinéraire",
    step5: "Mise en œuvre du service",
    step6: "Suivi et service client",
    step7: "Évaluation et amélioration continue",
    processTitle: "Processus de transport touristique",
    processIntro:
      "Dans le processus de transport touristique, nous nous consacrons à offrir des expériences de voyage mémorables pour que vous profitiez pleinement de vos destinations préférées. Nous commençons par une exploration initiale pour comprendre vos intérêts, puis :",
    processLi1: "Nous planifions et proposons des itinéraires personnalisés selon vos préférences.",
    processLi2: "Nous gérons les réservations et confirmations efficacement pour garantir une expérience sans accroc.",
    processLi3: "Nous préparons un itinéraire détaillé incluant les activités et lieux à visiter pendant votre voyage.",
    processLi4: "Nous mettons en œuvre le service comme prévu, garantissant votre confort et sécurité à tout moment.",
    processLi5: "Nous fournissons un suivi et un soutien continus pour nous assurer que votre expérience soit satisfaisante.",
    processLi6: "Nous évaluons régulièrement notre service et cherchons des moyens de l'améliorer pour des expériences encore plus enrichissantes.",
    processOutro:
      "Notre objectif est de fournir un transport touristique de qualité qui vous permette d'explorer de nouveaux lieux et de créer des souvenirs inoubliables. Contactez-nous pour plus d'informations ou pour commencer à planifier votre prochain voyage.",
    regsTitle: "Réglementations et exigences pour le transport touristique",
    reg1: "Permis de circulation et/ou carte d'exploitation valide.",
    reg2: "RNT - Registre National du Tourisme.",
    reg3: "Certificat de révision technique-mécanique et gaz valide.",
    reg4: "Format Unique du Contrat (FUEC).",
    reg5: "Permis de conduire pour véhicule de service public en catégories C1 ou C2, selon le cas.",
    reg6: "Assurance Obligatoire d'Accidents de la Circulation (SOAT) valide.",
    reg7: "Document d'identité du chauffeur lié dans le FUEC.",
    reg8: "Polices de responsabilité civile extracontractuelle et contractuelle valides.",
  },
  privacidad: {
    pageHeader: "Politique de confidentialité",
    intro:
      "Chez Transportes Maco Tours, nous nous engageons envers la confidentialité de nos utilisateurs. Cette Politique de Confidentialité décrit comment nous collectons, utilisons et protégeons les informations personnelles obtenues via notre site web et d'autres canaux de communication.",
    collect1:
      "Informations de contact telles que nom, adresse e-mail et numéro de téléphone fournies via des formulaires de contact ou des abonnements à des newsletters.",
    collect2:
      "Informations de paiement telles que les données de carte de crédit ou de débit fournies pour traiter les paiements de services.",
    collect3:
      "Informations démographiques telles que la localisation géographique pouvant être collectées à des fins d'analyse et d'amélioration des services.",
    noCookies:
      "Il est important de noter que nous ne collectons pas automatiquement d'informations personnelles via des cookies ou d'autres technologies de suivi.",
    useTitle: "Utilisation des informations",
    useIntro: "Les informations personnelles que nous collectons sont utilisées aux fins suivantes :",
    use1: "Répondre aux demandes et questions des utilisateurs.",
    use2: "Traiter les paiements pour les services contractés.",
    use3: "Envoyer des communications marketing et des newsletters si l'utilisateur a choisi de les recevoir.",
    use4: "Améliorer nos produits et services grâce à l'analyse des données et aux retours des utilisateurs.",
    discloseTitle: "Divulgation des informations",
    discloseIntro:
      "Chez Transportes Maco Tours, nous ne vendons, ne louons ni ne partageons d'informations personnelles avec des tiers, sauf dans les circonstances suivantes :",
    disclose1:
      "Lorsque nécessaire pour fournir les services demandés par l'utilisateur, comme le traitement des paiements.",
    disclose2:
      "Pour se conformer aux obligations légales, comme répondre à des ordonnances judiciaires ou des exigences gouvernementales.",
    disclose3: "Avec le consentement exprès de l'utilisateur.",
    securityTitle: "Sécurité des informations",
    securityText:
      "Chez Transportes Maco Tours, nous nous engageons à protéger les informations personnelles de nos utilisateurs par des mesures de sécurité appropriées, y compris des garanties physiques, électroniques et administratives pour prévenir l'accès non autorisé, la divulgation, l'utilisation abusive ou l'altération des informations personnelles.",
    thirdTitle: "Liens vers des tiers",
    thirdText:
      "Notre site web peut contenir des liens vers des sites tiers qui ne sont pas sous notre contrôle. Nous ne sommes pas responsables des pratiques de confidentialité ou du contenu de ces sites. Nous recommandons de consulter leurs politiques de confidentialité avant de fournir des informations personnelles.",
    changesTitle: "Modifications de cette politique de confidentialité",
    changesText:
      "Transportes Maco Tours se réserve le droit de mettre à jour cette Politique de Confidentialité à tout moment. Les modifications importantes seront notifiées en les publiant ici. Nous encourageons les utilisateurs à consulter périodiquement cette page pour rester informés de la façon dont nous protégeons les informations personnelles que nous collectons.",
  },
};

for (const [lang, data] of [
  ["pt", pt],
  ["it", it],
  ["fr", fr],
]) {
  const out = {};
  for (const page of Object.keys(en)) {
    out[page] = { ...en[page], ...data[page] };
  }
  fs.writeFileSync(
    path.join(__dirname, `i18n-pages-${lang}.json`),
    JSON.stringify(out, null, 2) + "\n",
    "utf8"
  );
  console.log("Wrote", lang);
}
