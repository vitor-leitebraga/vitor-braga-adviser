import defaultTheme from "tailwindcss/defaultTheme";
import typography from "@tailwindcss/typography";
import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
		"./vendor/laravel/jetstream/**/*.blade.php",
		"./storage/framework/views/*.php",
		"./resources/views/**/*.blade.php",
		"./resources/js/**/*.vue",
	],

	theme: {
		extend: {
			fontFamily: {
				sans: ["Figtree", ...defaultTheme.fontFamily.sans],
			},
		},
	},

	daisyui : {
		themes : [
			{
				vbbank: {
					primary: "#0E1416",
					"primary-content": "#FFFFFF",
					secondary: "#210E51",
					accent: "#534e4e",
					neutral: "#2A3E43",
					"base-100": "#FFFFFF",
				},
			}
		]
	},

	plugins: [typography, daisyui],
};
