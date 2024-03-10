<template>
	<div class="flex flex-col gap-2">
		<FormRow>
			<template #firstItem>
				<FormLabel target="firstname">
					First Name *
				</FormLabel>
				<InputText
					id="firstname"
					v-model="personalForm.firstname"
					name="firstname"
					:maxlength="50"
					placeholder="John"
					:error="formErrors.firstname"
				/>
			</template>
			<template #secondItem>
				<FormLabel target="lastname">
					Last Name *
				</FormLabel>
				<InputText
					id="lastname"
					v-model="personalForm.lastname"
					name="lastname"
					:maxlength="100"
					placeholder="Doe"
					:error="formErrors.lastname"
				/>
			</template>
		</FormRow>
		<div>
			<FormLabel target="email">
				E-mail *
			</FormLabel>
			<InputText
				id="email"
				v-model="personalForm.email"
				name="email"
				type="email"
				placeholder="johndoe@email.com"
				:error="formErrors.email"
			/>
		</div>
		<div>
			<FormLabel target="phone">
				Phone No *
			</FormLabel>
			<InputMask
				id="phone"
				v-model="personalForm.phone"
				name="phone"
				:maxlength="20"
				placeholder="(472) 123-4321"
				custom-mask="(###) ###-####"
				:error="formErrors.phone"
			/>
		</div>
		<div>
			<FormLabel target="contactPreference">
				Contact Preference *
			</FormLabel>
			<InputSelect
				id="contactPreference"
				v-model="personalForm.contactpreference"
				name="contactPreference"
				placeholder="Please, select your preference:"
				:error="formErrors.contactpreference"
				:options="contactPreferences"
			/>
		</div>
	</div>
</template>

<script setup>

import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import InputText from "@/Components/Form/InputText.vue";
import FormRow from "@/Components/Form/FormRow.vue";
import InputMask from "@/Components/Form/InputMask.vue";
import InputSelect from "@/Components/Form/InputSelect.vue";
import FormLabel from "@/Components/Form/FormLabel.vue";
import contactPreferences from "@/Assets/contactPreferences.json"
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";

const personalForm = computed(() => {
	return useProspectionStore().getForm()
})

const formErrors = computed(() => {
	return usePage().props.errors
})

</script>
