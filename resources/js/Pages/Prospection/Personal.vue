<template>
	<ProspectionFormLayout
		title="Personal Information"
		description="Before we continue, please let us know how we can contact you regarding your quote:"
	>
		<div class="flex flex-col gap-y-4 px-2">
			<PersonalForm />
			<button
				class="btn btn-lg btn-primary text-xl"
				@click="checkFieldsFilled"
			>
				Continue
			</button>
			<button
				class="btn btn-lg btn-accent text-xl"
				@click="prospectionStore.goToPreviousStep()"
			>
				Back
			</button>
		</div>
	</ProspectionFormLayout>
</template>

<script setup>

import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import {email, minLength, required} from "@vuelidate/validators"
import ProspectionFormLayout from "@/Layouts/ProspectionFormLayout.vue";
import PersonalForm from "@/Components/ProspectionForm/PersonalForm.vue";

const prospectionStore = useProspectionStore()

const rules = {
	firstname: {required},
	lastname: {required},
	email: {required, email},
	phone: {required, minLength: minLength(14)},
}

const checkFieldsFilled = async() => {
	if(!await prospectionStore.checkFormData(rules)){
		return
	}
	prospectionStore.getForm().clearErrors()
	prospectionStore.goToNextStep()
}

</script>
