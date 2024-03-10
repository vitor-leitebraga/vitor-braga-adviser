<template>
	<div class="flex flex-col gap-y-1">
		<select
			:id="id"
			:name="name"
			class="select select-bordered shadow-sm border-primary w-full"
			:class="{
				'select-error border-error': error
			}"
			@input="$emit('update:modelValue', $event.target.value)"
		>
			<option
				value=""
				disabled
			>
				{{ placeholder }}
			</option>
			<option
				v-for="(option, index) in options"
				:key="index"
				:value="option.id"
				class="text-primary"
				:selected="modelValue === option.id || option.selected"
			>
				{{ option.name }}
			</option>
		</select>
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
	id: {
		type: String,
		default: ""
	},
	name: {
		type: String,
		default: ""
	},
	modelValue: {
		type: String,
		default: ""
	},
	options: {
		type: Array,
		default: () => []
	},
})

defineEmits(["update:modelValue"])

</script>
