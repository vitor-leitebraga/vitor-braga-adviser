import { defineStore } from "pinia"
import {ref} from "vue";
import {useForm, usePage} from "@inertiajs/vue3";
import states from "@/Assets/states.json"
import steps from "@/Assets/steps.json"
import contactPreferences from "@/Assets/contactPreferences.json"
import {useVuelidate} from "@vuelidate/core";

export const useProspectionStore = defineStore("ProspectionStore", () => {
	const currentStep = ref(1)
	const form = useForm({
		categories: [],
		firstname: "",
		lastname: "",
		email: "",
		phone: "",
		contactpreference: contactPreferences[0].id,
		address: "",
		complement: "",
		state: states[0].id,
		city: "",
		zipcode: ""
	})

	const $reset = () => {
		form.reset()
		currentStep.value = 1
	}

	const checkFormData = async (rules) => {
		const vuelidate = useVuelidate(rules, getForm())
		const fieldsFilled = await vuelidate.value.$validate()
		if (!fieldsFilled) {
			usePage().props.errors = []
			vuelidate.value.$errors.forEach((item) => {
				usePage().props.errors[item.$property.toLowerCase()] = item.$message
			})
			return false
		}
		return true
	}

	const getForm = () => {
		return form
	}

	const getCategories = () => {
		return getForm().categories
	}

	const setCategories = (selectedCategories) => {
		getForm().categories = selectedCategories
	}

	const isCategorySelected = (category) => {
		return getCategories().includes(category)
	}

	const updateCategories = (category) => {
		if(isCategorySelected(category)){
			getCategories().splice(getCategories().indexOf(category), 1)
			return
		}
		getCategories().push(category)
	}

	const getCurrentStep = () => {
		return currentStep.value
	}

	const setCurrentStep = (step) => {
		currentStep.value = step
	}

	const goToPreviousStep = () => {
		goToStep(currentStep.value - 1)
	}

	const goToNextStep = () => {
		goToStep(currentStep.value + 1)
	}

	const backToStep = (stepId) => {
		if(getCurrentStep() !== steps.length && stepId < getCurrentStep()){
			goToStep(stepId)
		}
	}

	const goToStep = (step) => {
		setCurrentStep(step)
	}

	return {
		checkFormData,
		getForm,
		getCategories,
		setCategories,
		isCategorySelected,
		updateCategories,
		getCurrentStep,
		setCurrentStep,
		goToNextStep,
		goToPreviousStep,
		backToStep,
		goToStep,
		$reset
	}
})
