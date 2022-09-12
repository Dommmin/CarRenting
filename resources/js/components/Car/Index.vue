<template>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
            <div class="container mx-auto flex-row w-auto">
                <div class="flex h-auto">
                    <div class="flex-1 w-64 pb-5 pt-10 max-h-[46rem]">
                        <img
                            class="object-cover rounded-3xl hidden md:block max-h-full ml-10 shadow-2xl"
                            :src="'images/bmw_m3.jpg'"
                            alt="logo">
                    </div>
                    <div class="flex-none w-96 m-auto">
                        <p class="flex justify-center items-center text-6xl">Wynajmij samochód!</p>
                    </div>
                </div>


                <div class="mt-10">
                    <p class="font-bold text-2xl">Najczęściej wynajmowane samochody</p>
                    <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols mb-10 w-auto">
                        <!-- Car --->
                        <div
                            class="border border-white rounded-3xl m-2 pb-5 lg:hover:scale-105 duration-500 shadow-2xl"
                            v-for="car in cars.data"
                            :class="car.available ? 'bg-green-300' : 'bg-red-300'"
                        >
                            <img :src="'/images/' + car.main" alt="car-5" class="rounded-3xl p-2 w-full">
                            <div class="flex mb-3">
                                <div class="flex-1">
                                    <p class="ml-4 mt-2 text-xl">{{ car.name }}</p>
                                </div>
                                <div class="flex-none mr-3 mt-2">
                                    <span class="border border-dashed border-blue-400 rounded-2xl px-2 py-1">{{ car.year }}</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 text-center mb-3">
                                <div class="">
                                    <i class="fas fa-user-friends text-cyan-600"></i> <span>{{ car.seats }} Osobowy</span>
                                </div>
                                <div class="">
                                    <i class="fas fa-gas-pump text-cyan-600"></i> <span class="">{{ car.fuel }}</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 text-center">
                                <div class="">
                                    <i class="fas fa-tint text-cyan-600"></i> <span>{{ car.fuel_consumption }} l / 100km</span>
                                </div>
                                <div class="">
                                    <i class="fas fa-cogs text-cyan-600"></i> <span>{{ car.gearbox }}</span>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <p>{{ car.price }} zł / dzień</p>
                            </div>
                            <hr class="mr-5 ml-5 mt-3 mb-3">

                            <!-- Favorites -->

<!--                            <div v-for="favorite in car.favorites">-->
<!--&lt;!&ndash;                                <div v-if="favorite.user_id === user.id">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <i class="flex justify-center items-center fas fa-heart text-3xl text-red-500 hover:text-blue-500 duration-500"></i>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div v-if="favorite.user_id === user.id">&ndash;&gt;-->
<!--                                    <i class="flex justify-center items-center fas fa-heart text-3xl"></i>-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                                <div>-->
<!--                                    <i class="flex justify-center items-center far fa-heart text-3xl"></i>-->
<!--                                </div>-->

<!--                            </div>-->


                            <div>
                                <div v-if="car.favorites.length === 0">
                                    <form @submit.prevent="addFavorite(car.id, user.id)">
                                        <div class="flex justify-center items-center">
                                            <button type="submit" class="bg-yellow-200 rounded-2xl p-2 text-blue-500 hover:text-red-500 duration-500">
                                                <i class="flex justify-center items-center far fa-heart text-3xl"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div v-for="favorite in car.favorites">
                                    <div v-if="favorite.user_id === user.id">
                                        <form @submit.prevent="removeFavorite(car.id, user.id)">
                                            <div class="flex justify-center items-center">
                                                <button type="submit" class="bg-yellow-200 rounded-2xl p-2 text-blue-500 hover:text-red-500 duration-500">
                                                    <i class="flex justify-center items-center fas fa-heart text-3xl text-red-500 hover:text-blue-500 duration-500"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Favorites -->

                            <div class="flex-row justify-center items-center text-center mt-3">
                                <router-link :to="{ name: 'car.show', params: { slug: car.slug, id: car.id  } }">
                                    <button class="bg-cyan-400 hover:bg-cyan-500 duration-300 px-4 py-2 rounded-3xl text-white">
                                        Wynajmij
                                    </button>
                                </router-link>
                            </div>



                        </div>
                        <!-- Car --->
                    </div>
                </div>
            </div>
        </div>
        <!-- /End replace -->
    </div>
</template>

<script setup>
import useCars from "../../composables/cars";
import {onMounted} from "vue";
import useAuth from "@/composables/auth";

const { user } = useAuth();

const { cars, getCars, addFavorite, removeFavorite } = useCars();
onMounted(getCars)

</script>
