<template>
	<div class="flex flex-col gap-y-1">
		<input
			:id="id"
			:name="name"
			:value="modelValue"
			:disabled="disabled"
			:maxlength="maxlength"
			:type="type"
			:placeholder="placeholder"
			class="input shadow-sm border-1 border-primary w-full outline-primary"
			:class="{
				'input-error border-error': error,
				'disabled': disabled
			}"
			@input="$emit('update:modelValue', $event.target.value)"
		>
		<InputError :error="error" />
	</div>
</template>

<script setup>

import InputError from "@/Components/Form/FormError.vue";

defineProps({
	error: {
		type: String,
		default: ""
	},
	placeholder: {
		type: String,
		default: ""
	},
	modelValue: {
		type: String,
		default: ""
	},
	id: {
		type: String,
		default: ""
	},
	disabled: {
		type: Boolean,
		default: false,
	},
	maxlength: {
		type: Number,
		default: 255
	},
	name: {
		type: String,
		default: ""
	},
	type: {
		type: String,
		default: "text"
	}
})

defineEmits(["update:modelValue"])

</script>
