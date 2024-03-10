<template>
	<div>
		<Head :title="title" />
		<div class="flex justify-center w-full min-h-screen bg-pvar-900 p-4">
			<div class="flex flex-col gap-y-4 w-full max-w-7xl text-gray-300 bg-pvar-600 rounded-lg p-2">
				<h1 class="flex items-center justify-center text-4xl h-60">
					Vitor Braga Bank
				</h1>
				<div class="flex flex-1 justify-center h-full">
					<div class="w-full max-w-md shadow-xl shadow-pvar-900 p-4 rounded-xl h-fit bg-pvar-500">
						<slot />
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";

defineProps({
	title: {
		type: String,
		default: ""
	},
});

</script>
