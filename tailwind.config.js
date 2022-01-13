const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./templates/**/*.{html,php}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        logo: ['Be Vietnam Pro', ...defaultTheme.fontFamily.sans]
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
