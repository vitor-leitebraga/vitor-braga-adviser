<template>
	<Head :title="title" />
	<div class="flex justify-center w-full min-h-screen bg-white">
		<div class="flex w-full">
			<div class="w-2/5 h-full">
				<img
					:src="useAsset('consumer_form/all_categories.png')"
					class="w-full min-h-full object-none max-h-screen"
					alt="Insurance Category Image"
				>
			</div>
			<div class="flex flex-col w-3/5 h-full text-primary">
				<Step
					:steps="steps"
					:current-step="prospectionStore.getCurrentStep()"
					@back-to-step="backToStep"
				/>

				<div class="flex w-full h-full">
					<slot />
				</div>
			</div>
		</div>
	</div>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";
import {useAsset} from "@/Composables/useAsset.js";
import Step from "@/Components/Step.vue";
import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import steps from "@/Assets/steps.json"

defineProps({
	title: {
		type: String,
		default: ""
	}
});

const prospectionStore = useProspectionStore()

const backToStep = (stepId) => {
	prospectionStore.backToStep(stepId)
}

//Making sure everything is cleared
prospectionStore.$reset()

</script>
