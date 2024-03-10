<template>
	<ul class="steps py-12 text-xl bg-primary/30">
		<li
			v-for="step in steps"
			:key="step.id"
			class="step cursor-pointer"
			:class="{
				'step-primary': currentStep >= step.id
			}"
			@click="$emit('backToStep', step.id)"
		>
			{{ step.name }}
		</li>
	</ul>
</template>

<script setup>

defineProps({
	steps: {
		type: Array,
		default: () => []
	},
	currentStep: {
		type: Number,
		default: 1
	}
})

defineEmits(["backToStep"])

</script>
