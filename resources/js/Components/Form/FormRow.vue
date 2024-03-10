<template>
	<div class="flex flex-col md:flex-row gap-2 w-full">
		<div class="flex-1">
			<slot name="firstItem" />
		</div>
		<div class="flex-1">
			<slot name="secondItem" />
		</div>
	</div>
</template>

<script setup>
</script>
