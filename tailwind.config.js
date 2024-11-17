import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#46AAC8",
                secondary: "#F263B4",
                "secondary-light": "#F2C6DF",
                light: "#F8F1DA",
                green: "#77BB54",
            },
            fontFamily: {
                poppins: ["Poppins", ...defaultTheme.fontFamily.serif],
                barrio: ["Barrio", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
