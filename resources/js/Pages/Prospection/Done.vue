<template>
	<ProspectionLayout title="Insurance - Done">
		<ProspectionFormLayout
			title="Thank you!"
			description="Now you can leave it to us! Don't worry, we will be in touch as fast as possible. Thank you for trusting us!"
		>
			<div class="flex flex-col gap-y-10 items-center justify-center w-full min-h-full">
				<font-awesome-icon
					class="text-primary w-80 h-80"
					:icon="faCircleCheck"
				/>
				<Link
					:href="route('prospection.index')"
					class="btn btn-lg btn-primary text-xl"
				>
					New Insurance
				</Link>
			</div>
		</ProspectionFormLayout>
	</ProspectionLayout>
</template>

<script setup>
import ProspectionLayout from "@/Layouts/ProspectionLayout.vue";
import {onMounted} from "vue";
import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import steps from "@/Assets/steps.json"
import ProspectionFormLayout from "@/Layouts/ProspectionFormLayout.vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import { faCircleCheck } from "@fortawesome/free-solid-svg-icons";
import {Link} from "@inertiajs/vue3"
import { route } from "ziggy-js";

const prospectionStore = useProspectionStore()

onMounted(() => {
	prospectionStore.setCurrentStep(steps.length)
})
</script>
