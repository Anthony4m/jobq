/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./index.html",
        "./src/**/*.{js,ts,jsx,tsx}",
    ],
  theme: {
    extend: {
        colors: {
            jBlue: "#2a85ff",
            jGray: "#a1a1a2",
            jBlack: "#070707",
            jWhite: "#f0f5fa",
        },
        fontFamily:{
            sans:['Poppins', 'sans-serif']
        },
        screens: {
            'tablet': '640px',
            // => @media (min-width: 640px) { ... }

            'laptop': '1024px',
            // => @media (min-width: 1024px) { ... }

            'desktop': '1280px',
            // => @media (min-width: 1280px) { ... }
        },
    },
  },
  plugins: [],
}

