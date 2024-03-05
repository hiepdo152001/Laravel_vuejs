/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'pink-orange': '#f5b282',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

