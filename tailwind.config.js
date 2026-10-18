import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Paleta Lumin (extraída do protótipo no Figma)
                ink: { DEFAULT: '#09061b', 2: '#100b26' },
                surface: { DEFAULT: '#1b1630', 2: '#25202f' },
                lumin: {
                    violet: '#5a10dd',
                    magenta: '#c41bd9',
                    pink: '#fe4fd7',
                    blue: '#4a7cfd',
                    cyan: '#1fc8e0',
                },
            },
        },
    },

    plugins: [forms],
};
