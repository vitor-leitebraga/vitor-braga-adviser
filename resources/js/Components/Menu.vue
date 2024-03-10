<template>
	<div class="w-full flex flex-col gap-y-4 items-center justify-center">
		<div class="relative w-full flex justify-center">
			<div class="flex gap-x-2 w-full grow p-1 bg-monster-900 rounded-3xl max-w-xl">
				<Link
					v-for="(item, index) in navigation"
					:key="index"
					:href="route(item.routeName)"
					class="flex items-center w-fit py-2 px-4 rounded-3xl text-sm"
					:class="{
						'bg-monster-400 cursor-default': item.active,
						'cursor-pointer bg-monster-400/20': !item.active
					}"
				>
					{{ item.name }}
				</Link>
			</div>
<!--			<div-->
<!--				class="absolute right-0 items-center flex h-full p-2 justify-end w-fit cursor-pointer"-->
<!--				@click="logout"-->
<!--			>-->
<!--				<span>Logout</span>-->
<!--			</div>-->
		</div>
		<div class="h-0.5 w-full bg-monster-50" />
	</div>
</template>

<script setup>
import {Link, router} from "@inertiajs/vue3";
import { route } from "ziggy-js";

const navigation = [
	// {id: 0, name: "Transactions", routeName: "transaction.index", active: route().current() === "transaction.index"},
	// {id: 1, name: "Purchases", routeName: "transaction.purchase", active: route().current() === "transaction.purchase"},
]

const logout = () => {
	router.post(route("logout"));
};

</script>
