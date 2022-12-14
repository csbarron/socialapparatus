const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                rose: colors.rose,
                'blue-gray': colors.slate,
                cyan: colors.cyan,
                one:"#EFF7FB",
                two:"#3D87C7",
                three:"#5193CD"
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),require('@tailwindcss/aspect-ratio')      ,require('@tailwindcss/line-clamp')],
};
