/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        main: ["Montserrat", "sans-serif"],
        secondary: ["Lobster", "sans-serif"],
      },
      colors: {
        blue: "#132D46",
        green: "#00C48E",
        bg: "#F8FBFF",
      },
    },
  },
  plugins: [],
}

