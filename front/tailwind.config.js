/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './src/**/*.{js,jsx,ts,tsx}',
    ],
    theme: {
        extend: {},
        colors: {
            'title': '#e11d48',
            'dark_lavender': '#7D6774',
            'light_gray':'#A6A6A6'

        }
    },
    plugins: [
        require('flowbite/plugin')
    ]
}

