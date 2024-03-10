<template>
	<div class="flex flex-col gap-2">
		<FormRow>
			<template #firstItem>
				<FormLabel target="address">
					Address *
				</FormLabel>
				<InputText
					id="address"
					v-model="addressForm.address"
					name="address"
					:maxlength="50"
					placeholder="709 Texas Ave"
					:error="formErrors.address"
				/>
			</template>
			<template #secondItem>
				<FormLabel target="complement">
					Complement
				</FormLabel>
				<InputText
					id="complement"
					v-model="addressForm.complement"
					name="complement"
					:maxlength="50"
					placeholder="Apt 01, close to McDonalds"
					:error="formErrors.complement"
				/>
			</template>
		</FormRow>
		<div>
			<FormLabel target="state">
				State *
			</FormLabel>
			<InputSelect
				id="state"
				v-model="addressForm.state"
				name="state"
				placeholder="Texas"
				:error="formErrors.state"
				:options="states"
			/>
		</div>
		<div>
			<FormLabel target="city">
				City *
			</FormLabel>
			<InputText
				id="city"
				v-model="addressForm.city"
				name="city"
				placeholder="Austin"
				:error="formErrors.city"
			/>
		</div>
		<div>
			<FormLabel target="zipcode">
				Zip Code *
			</FormLabel>
			<InputMask
				id="zipcode"
				v-model="addressForm.zipcode"
				name="zipcode"
				placeholder="77234"
				:maxlength="5"
				custom-mask="#####"
				:error="formErrors.zipcode"
			/>
		</div>
	</div>
</template>

<script setup>

import {useProspectionStore} from "@/Stores/ProspectionStore.js";
import InputSelect from "@/Components/Form/InputSelect.vue";
import InputText from "@/Components/Form/InputText.vue";
import FormRow from "@/Components/Form/FormRow.vue";
import states from "@/Assets/states.json"
import FormLabel from "@/Components/Form/FormLabel.vue";
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";
import InputMask from "@/Components/Form/InputMask.vue";

const addressForm = computed(() => {
	return useProspectionStore().getForm()
})

const formErrors = computed(() => {
	return usePage().props.errors
})

</script>
