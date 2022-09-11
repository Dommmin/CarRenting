<template>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Car</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Starts</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ends</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">To Pay</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-center text-lg">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <tr v-for="rent in rents.data" class="transition ease-in duration-100 hover:bg-gray-300">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                        {{ rent.id }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                        {{ rent.user }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                        {{ rent.car }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                        {{ rent.starts }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                        {{ rent.ends }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 ">
                        {{ rent.toPay }} zł
                    </td>
                    <td class="flex items-center justify-center whitespace-no-wrap text-sm leading-5 text-gray-900">
                        <div class="mt-4">
                            <!--                                    <router-link :to="{ name: 'surveys.edit', params: { id: car.id } }">-->
                            <svg class="h-6 w-6 text-cyan-500 hover:text-cyan-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <!--                                    </router-link>-->
                        </div>
                        <div class="mt-4 ml-3">
                            <a href="#" @click.prevent="deleteRent(rent.id)">
                                <svg class="h-6 w-6 text-red-500 hover:text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                        <div class="mt-4 ml-3">
                            <!--                                    <router-link :to="{ name: 'surveys.stats' }">-->
                            <svg class="h-6 w-6 text-violet-500 hover:text-violet-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <!--                                    </router-link>-->
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /End replace -->
    </div>
</template>

<script setup>
import useCars from "../../../composables/cars";
import {onMounted} from "vue";

const { rents, getRents, deleteRent } = useCars();
onMounted(getRents)
</script>
