<template>
	<div class="flex flex-col gap-y-1">
		<input
			:id="id"
			ref="input"
			v-maska
			:name="name"
			class="input shadow-sm border-1 border-primary w-full outline-primary"
			:placeholder="placeholder"
			:value="modelValue"
			:data-maska="customMask"
			:class="{
				'input-error border-error': error,
			}"
			@input="$emit('update:modelValue', $event.target.value)"
		>
		<InputError :error="error" />
	</div>
</template>

<script setup>
import { vMaska } from "maska"
import InputError from "@/Components/Form/FormError.vue";

defineProps({
	modelValue: {
		type: String,
		default: ""
	},
	customMask: {
		type: String,
		default: ""
	},
	id: {
		type: String,
		default: ""
	},
	name: {
		type: String,
		default: ""
	},
	error: {
		type: String,
		default: ""
	},
	placeholder: {
		type: String,
		default: ""
	},
})

defineEmits(["update:modelValue"])
</script>
