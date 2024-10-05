import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-red': {
                    DEFAULT: '#FF2D20',
                    50: '#FF9D90',
                    100: '#FF8D80',
                    200: '#FF7D70',
                    300: '#FF6D60',
                    400: '#FF5D50',
                    500: '#FF4D40',
                    600: '#FF3D30',
                    700: '#FF2D20',
                    800: '#FF1010',
                    900: '#FF0000',
                },
                'custom-blue': {
                    DEFAULT: '#07a6ff',
                    300: '#07f6ff',
                    400: '#07d6ff',
                    500: '#07c6ff',
                    600: '#07b6ff',
                    700: '#07a6ff',
                    800: '#0796ef',
                    900: '#0786df',
                },
            },
        },
    },

    plugins: [forms],
};
