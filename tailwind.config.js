/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ['"Poppins"', "sans-serif"], // Tambahkan nama font
            },
            colors: {
                cream: {
                    100: "#FFFDD0",
                    200: "#FAF3E0",
                    300: "#F5F5DC",
                },
            },
        },
    },
    plugins: [],
};
