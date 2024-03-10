<template>
	<ProspectionLayout title="Insurance">
		<Categories v-if="currentStep === 1" />
		<Personal v-else-if="currentStep === 2" />
		<Address v-else-if="currentStep === 3" />
		<ProspectionDone v-else />
	</ProspectionLayout>
</template>

<script setup>
import ProspectionLayout from "@/Layouts/ProspectionLayout.vue";
import {computed} from "vue";
import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import Personal from "@/Pages/Prospection/Personal.vue";
import Address from "@/Pages/Prospection/Address.vue";
import ProspectionDone from "@/Pages/Prospection/ProspectionDone.vue";
import Categories from "@/Pages/Prospection/Categories.vue";

const prospectionStore = useProspectionStore()

const currentStep = computed(() => {
	return prospectionStore.getCurrentStep()
})

</script>
