const colors = require('tailwindcss/colors')

module.exports = {
    darkMode: 'class',
    content: ['./resources/**/*.blade.php', './vendor/filament/**/*.blade.php', './node_modules/flowbite/**/*.js'],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin')
    ],
}
