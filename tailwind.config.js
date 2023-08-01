const defaultTheme = require('tailwindcss/defaultTheme');
import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#38bdf8",
          "secondary": "#e0f2fe",
          "accent": "#37CDBE",
          "neutral": "#3D4451",
          "base-100": "#FFFFFF",
          "info": "#cffafe",
          "success": "#36D399",
          "warning": "#FBBD23",
          "error": "#F87272",
        },
        extend: {
          colors: {
            danger: colors.rose,
            primary: colors.blue,
            success: colors.green,
            warning: colors.yellow,
          },
        },
      },
    ],
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('daisyui'),
    forms,
    typography,
  ],
};
