<template>
	<ProspectionFormLayout
		title="Choose your preference"
		description="Please, help us understand your needs. Which categories you'd like to have quoted for insurance:"
		:image="useAsset('consumer_form/home.png')"
	>
		<div class="flex gap-4">
			<ItemSelector
				v-for="category in categories"
				:key="category.id"
				class="flex-1"
				:icon="category.icon"
				:name="category.name"
				:image="category.image"
				:checked="prospectionStore.isCategorySelected(category.name)"
				@update:model-value="selectCategory"
			/>
		</div>

		<button
			class="btn btn-lg btn-primary text-xl"
			:disabled="prospectionStore.getCategories().length < 1"
			@click="prospectionStore.goToNextStep()"
		>
			Agree and Continue
		</button>
	</ProspectionFormLayout>
</template>

<script setup>
import ItemSelector from "@/Components/ItemSelector.vue";
import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import ProspectionFormLayout from "@/Layouts/ProspectionFormLayout.vue";
import {useAsset} from "@/Composables/useAsset.js";

const prospectionStore = useProspectionStore()

const categories = [
	{id: 1, name: "Home", image: "consumer_form/home.png"},
	{id: 2, name: "Auto", image: "consumer_form/auto.png"},
	{id: 3, name: "Recreational Vehicle", image: "consumer_form/recreational.png"},
]

const selectCategory = (categoryName) => {
	prospectionStore.updateCategories(categoryName)
}
</script>
