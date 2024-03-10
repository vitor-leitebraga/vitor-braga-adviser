<template>
	<div class="flex flex-col w-full h-full">
		<div class="flex flex-col">
			<h1 class="text-4xl font-bold bg-primary text-primary-content w-full p-4">
				{{ title }}
			</h1>
			<p class="w-full text-primary-content bg-primary/60 p-4">
				{{ description }}
			</p>
		</div>
		<div class="flex flex-col w-full p-6 gap-y-4">
			<slot />
		</div>
	</div>
</template>

<script setup>
defineProps({
	title: {
		type: String,
		default: ""
	},
	description: {
		type: String,
		default: ""
	},
});

</script>
