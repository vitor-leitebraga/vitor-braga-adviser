<template>
	<div
		v-if="error"
		class="text-sm text-red-500 w-full text-left normal-case"
	>
		<div v-if="error instanceof Array">
			<span
				v-for="(errorMessage, index) in error"
				:key="index"
			>{{ errorMessage }}</span>
		</div>
		<div v-else>
			{{ error }}
		</div>
	</div>
</template>

<script setup>

defineProps({
	error: {
		type: String,
		default: ""
	}
})

</script>
