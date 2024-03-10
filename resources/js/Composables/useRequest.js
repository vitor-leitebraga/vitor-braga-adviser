/* eslint-disable */
import axios from "axios";
import route from "ziggy";
import { ref } from "vue";
import { useToast } from "vue-toastification";
import { useCheckAuth } from "@/Composables/useAuth";
import { router } from "@inertiajs/vue3";

export const POST = "post"
export const GET = "get"
export const VISIT = "visit"

const loader = ref([])

/**
 * @param method Type of the request: POST, GET or VISIT
 * @param options Options allowed in the request
 * @param options.routeName {String} Route name to request to
 * @param options.routeParams {Object|null} Parameters to be sent with the route
 * @param options.data {Array}The parameters included in the request
 * @param options.success {Object} Callback after a successful request is done
 * @param options.error {Object} Callback triggered after an unsuccessful request
 * @param options.loadingContainer {Object} Reference of the element that will be loading
 * @param options.preRequest {Object} Callback to be executed before the request
 * @param options.useAuth {Boolean} If a logged user is needed to the request
 * @param options.authCustomRedirect {String} Redirect to specific page after login
 * @param options.finally {Object} Callback to be executed after success and error.
 */
export function useRequest(method, options) {
	startDefaultOptions(options)

	if(options.useAuth && !useCheckAuth()){
		router.get("login")
		return
	}

	switch(method){
		case POST: {
			const loaderIndex = prePost(options);
			return usePost(options).finally(() => {
				// loader.value[loaderIndex].hide();
			})
		}

		// case VISIT: {
		// 	router.visit(options.routeParams ? route(options.routeName, options.routeParams) : route(options.routeName))
		// 	break;
		// }
		//
		// default:
		// case GET: {
		// 	useGet(options)
		// 	break;
		// }
	}
}

function useGet(options) {
	axios.get( route(options.routeName, options.routeParams), {params: options.data}).then(options.success).catch(options.error)
		.finally(options.finally);
}

function prePost(options){
	if(options.preRequest){
		options.preRequest();
	}

	// if(options.loadingContainer){
	// 	const loaderIndex = loader.value.length
	// 	loader.value.push(useShowLoader(options.loadingContainer))
	// 	return loaderIndex
	// }

	return null;
}

function usePost(options) {
	return axios.post( route(options.routeName, options.routeParams), options.data).then(options.success).finally(options.finally).catch(options.error);
}

function isLoading(){
	return loading.value
}

function setLoading(isLoading){
	loading.value = isLoading
}

function startDefaultOptions(options){
	if(!options.error){
		options.error = () => {
			useToast().error("Something went wrong. Please, try again.")
		}
	}

	if(!options.useAuth){
		options.useAuth = false
	}

	if(!options.routeParams){
		options.routeParams = null
	}
}
