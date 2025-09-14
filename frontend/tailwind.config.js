/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'zepay-blue': '#1e3a8a', // A deep, trustworthy blue
        'zepay-green': '#10b981', // A vibrant, reassuring green
      },
    },
  },
  plugins: [],
}

