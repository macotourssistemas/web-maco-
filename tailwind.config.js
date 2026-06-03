/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./*.html",
    "./includes/**/*.php",
    "./componentes/**/*.{html,php}",
    "./assets/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        /* Verde del texto del logo Maco Tours */
        brand: {
          50: "#eef6f1",
          100: "#d5ebdd",
          200: "#a8d4b8",
          300: "#6bb882",
          400: "#3d9d5c",
          500: "#1a7a3e",
          600: "#156332",
          700: "#114d28",
          800: "#0d3a1e",
          900: "#092816",
          950: "#05170c",
        },
        /* Azul del arco / contorno del logo */
        accent: {
          50: "#eef3fa",
          100: "#d6e4f5",
          200: "#adc8eb",
          300: "#7aa6dc",
          400: "#4a82c9",
          500: "#1e4a8c",
          600: "#183d73",
          700: "#12305a",
          800: "#0c2342",
          900: "#07182e",
          950: "#040e1a",
        },
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', "system-ui", "sans-serif"],
      },
      boxShadow: {
        card: "0 4px 24px -4px rgba(9, 40, 22, 0.12)",
        header: "0 4px 30px rgba(5, 23, 12, 0.25)",
        "card-hover": "0 12px 40px -8px rgba(30, 74, 140, 0.2)",
      },
      backgroundImage: {
        "maco-gradient": "linear-gradient(135deg, #05170c 0%, #114d28 45%, #1e4a8c 100%)",
        "section-soft": "linear-gradient(180deg, #eef6f1 0%, #ffffff 50%, #eef3fa 100%)",
        "section-mint": "linear-gradient(180deg, #eef6f1 0%, #d5ebdd 100%)",
        "section-sky": "linear-gradient(135deg, #eef3fa 0%, #ffffff 55%, #eef6f1 100%)",
      },
    },
  },
  plugins: [],
};
