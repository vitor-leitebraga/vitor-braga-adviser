<template>
	<div
		class="flex flex-col justify-center items-center w-fit h-full bg-primary/20 rounded-xl cursor-pointer
			text-center group hover:bg-primary/40"
		@click="selectItem"
	>
		<div class="flex bg-black w-full rounded-t-lg text-white text-2xl justify-center p-2 min-h-16 items-center">
			{{ name }}
		</div>

		<div class="flex flex-col items-center justify-center w-full">
			<div class="relative w-full">
				<div class="absolute bg-transparent/10 w-full h-full"></div>
				<img
					:src="useAsset(image)"
					class="w-full object-cover max-h-72 group-hover:opacity-100"
					:class="{
						'opacity-70': !selected,
						'opacity-100': selected
					}"
					alt="Insurance Category Image"
				>
			</div>
			<div
				class="flex items-center justify-center rounded-full w-8 h-8 m-4"
				:class="{
					'bg-primary': selected,
					'bg-white': !selected
				}"
			>
				<font-awesome-icon
					v-if="selected"
					class="text-primary-content cursor-pointer w-4 h-4"
					:icon="faCheck"
				/>
			</div>
		</div>
	</div>
</template>

<script setup>

import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import { faCheck } from "@fortawesome/free-solid-svg-icons";
import {ref} from "vue";
import {useAsset} from "@/Composables/useAsset.js";

const props = defineProps({
	name: {
		type: String,
		default: ""
	},
	image: {
		type: String,
		default: ""
	},
	checked: {
		type: Boolean,
		default: false
	},
	modelValue: {
		type: String,
		default: ""
	}
})

const emit = defineEmits(["update:modelValue"])

const selected = ref(props.checked)

const selectItem = () => {
	selected.value = !selected.value
	emit("update:modelValue", props.name)
}

</script>
