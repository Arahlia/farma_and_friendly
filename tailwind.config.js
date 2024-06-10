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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                customPurple: {
                  500: '#C369AA',
                  800: '#972376'
                },
                customYellow: {
                    500: '#DAD008'
                },
                customGreen: {
                    500: '#0fd80f',
                    600: '#0fd80f',
                    700: '#06BA06',
                },
              },
            heigth: {
                'per-98' : '98%'
              },
        },
    },

    plugins: [forms],
};
