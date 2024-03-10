import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "ziggy-js";
import Vapor from "laravel-vapor";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome"
import {createPinia} from "pinia"

const appName = import.meta.env.VITE_APP_NAME || "Vitor Braga Advisor";

window.Vapor = Vapor;
window.Vapor.withBaseAssetUrl(import.meta.env.VITE_VAPOR_ASSET_URL)

createInertiaApp({
	title: (title) => `${title} - ${appName}`,
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob("./Pages/**/*.vue")),
	setup({ el, App, props, plugin }) {
		return createApp({ render: () => h(App, props) })
			.use(plugin)
			.use(ZiggyVue)
			.use(createPinia())
			.component("font-awesome-icon", FontAwesomeIcon)
			.mount(el);
	},
	progress: {
		color: "#4B5563",
	},
});
