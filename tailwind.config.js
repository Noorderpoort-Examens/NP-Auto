import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'np-yellow': 'rgba(232, 199,  0)',
        'np-dark': 'rgba(0, 0, 0)',
        'np-white': 'rgba(255, 255, 255)',
        'np-color-shade': 'rgba(65, 65, 65, 1)',
      },
      fontFamily: {
        opensans: ['Open Sans', ...defaultTheme.fontFamily.sans],
        roboto: ['Roboto', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
}
