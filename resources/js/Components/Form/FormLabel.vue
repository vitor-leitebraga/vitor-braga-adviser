<template>
	<label
		class="leading-7"
		:for="target"
	>
		<slot />
	</label>
</template>

<script setup>

defineProps({
	target: {
		type: String,
		default: ""
	}
})
</script>
