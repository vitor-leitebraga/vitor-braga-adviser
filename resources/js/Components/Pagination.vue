<template>
	<div class="flex w-full gap-y-2 items-center justify-center gap-x-4 flex-wrap">
		<Link
			v-for="(item, index) in items"
			:key="index"
			class="btn flex min-w-20 items-center justify-center bg-base-100 rounded-lg p-4 h-full"
			:href="item.url ?? ''"
			:class="{
				'btn-disabled': !!!item.url,
				'btn-active bg-base-300': item.active
			}"
			v-html="item.label"
		/>
	</div>
</template>

<script setup>

import { Link } from "@inertiajs/vue3";

defineProps({
	items: {
		type: Array,
		default: () => []
	}
})

</script>
