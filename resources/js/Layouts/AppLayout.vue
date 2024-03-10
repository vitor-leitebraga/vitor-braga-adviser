<template>
	<div>
		<Head :title="title" />
		<div class="flex justify-center w-full min-h-screen bg-pvar-900 p-4">
			<div class="flex flex-col gap-y-4 w-full max-w-7xl text-gray-300 bg-pvar-600 rounded-lg p-2">
				<Menu />
				<!--				<Breadcrumb v-if="route().current() !== 'home' && route().current() !== 'game.index'" />-->
				<slot />
			</div>
		</div>
	</div>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";
import Menu from "@/Components/Menu.vue";

defineProps({
	title: {
		type: String,
		default: ""
	},
});

</script>
