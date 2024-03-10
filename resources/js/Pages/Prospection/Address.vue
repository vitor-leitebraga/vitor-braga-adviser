<template>
	<ProspectionFormLayout
		title="Address Information"
		description="Understood! Please, fill this last piece of information so we can create something great:"
	>
		<div class="flex flex-col gap-y-4 px-2">
			<AddressForm />
			<button
				class="btn btn-lg btn-primary text-xl"
				:disabled="prospectionStore.getForm().processing"
				@click="checkAndSubmitData()"
			>
				<span
					v-if="prospectionStore.getForm().processing"
					class="loading loading-spinner"
				/>
				Complete
			</button>
			<button
				class="btn btn-lg btn-accent text-xl"
				:disabled="prospectionStore.getForm().processing"
				@click="prospectionStore.goToPreviousStep()"
			>
				<span
					v-if="prospectionStore.getForm().processing"
					class="loading loading-spinner"
				/>
				Back
			</button>
		</div>
	</ProspectionFormLayout>
</template>

<script setup>

import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import {usePage} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import {minLength, required} from "@vuelidate/validators";
import ProspectionFormLayout from "@/Layouts/ProspectionFormLayout.vue";
import AddressForm from "@/Components/ProspectionForm/AddressForm.vue";

const prospectionStore = useProspectionStore()

const rules = {
	address: {required},
	city: {required},
	zipcode: {required, minLength: minLength(5)},
}

const checkAndSubmitData = async () => {
	if(!await prospectionStore.checkFormData(rules)){
		return
	}
	submitData()
}

const submitData = () => {
	prospectionStore.getForm().post(route("prospection.store"), {
		onError: () => {
			const personalFormFields = ["firstname", "lastname", "email", "phone", "contact_preference"]
			const hasPersonalFormErrors = personalFormFields.some((item) => {
				return Object.prototype.hasOwnProperty.call(usePage().props.errors, item)
			})
			if(hasPersonalFormErrors){
				prospectionStore.goToPreviousStep()
			}
		}
	})
}

</script>
