module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        body: ['Nunito'],
        heading: ['"Roboto Condensed"']
      },
      margin: {
        header: '30rem'
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
