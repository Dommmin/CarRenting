<template>
    <div class="">
        <form @submit.prevent="updateCar(car)">
            <!-- Name -->
            <div>
                <label for="car-name" class="block font-medium text-sm text-gray-700">
                    Name
                </label>
                <input v-model="car.name" id="car-name" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.name">
                        {{ message }}
                    </div>
                </div>
            </div>
            <!-- Year -->
            <div class="mb-3">
                <label for="car-slug" class="block font-medium text-sm text-gray-700">
                    Year
                </label>
                <input v-model="car.year" id="car-slug" type="number" min="2020" max="2022" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.year">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Fuel -->
            <div class="mb-3 w-20">
                <label for="car-fuel" class="block font-medium text-sm text-gray-700">
                    Fuel
                </label>
                <select v-model="car.fuel" name="car-fuel" id="car-fuel" class="rounded-xl w-32">
                    <option v-for="fuel in fuels">{{ fuel }}</option>
                </select>
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.fuel">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Fuel Consumption -->
            <div class="mb-3">
                <label for="car-fuel_consumption" class="block font-medium text-sm text-gray-700">
                    Fuel Consumption ( l / 100 km )
                </label>
                <input v-model="car.fuel_consumption" id="car-fuel_consumption" type="number" step="0.1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.fuel_consumption">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Seats -->
            <div class="mb-3">
                <label for="car-seats" class="block font-medium text-sm text-gray-700">
                    Seats
                </label>
                <input type="radio" id="4" v-model="car.seats" value="4">
                <label class="m-2" for="4">4</label>

                <input type="radio" id="5" v-model="car.seats" value="5">
                <label class="ml-2" for="5">5</label>
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.seats">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Gearbox -->
            <div class="mb-3">
                <label for="car-gearbox" class="block font-medium text-sm text-gray-700">
                    Gearbox
                </label>
                <input type="radio" id="Automatyczna" v-model="car.gearbox" value="Automatyczna">
                <label class="m-2" for="Automatyczna">Automatyczna</label>
                <input type="radio" id="Manualna" v-model="car.gearbox" value="Manualna">
                <label class="ml-2" for="Manualna">Manualna</label>
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.gearbox">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="car-price" class="block font-medium text-sm text-gray-700">
                    Price ( $ )
                </label>
                <input v-model="car.price" id="car-price" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.price">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Horsepower -->
            <div class="mb-3">
                <label for="car-horsepower" class="block font-medium text-sm text-gray-700">
                    Horsepower ( KM )
                </label>
                <input v-model="car.horsepower" id="car-horsepower" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.horsepower">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Torque -->
            <div class="mb-3">
                <label for="car-torque" class="block font-medium text-sm text-gray-700">
                    Torque ( Nm )
                </label>
                <input v-model="car.torque" id="car-torque" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.torque">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Acceleration -->
            <div class="mb-3">
                <label for="car-acceleration" class="block font-medium text-sm text-gray-700">
                    Acceleration ( 0 - 100 km/h )
                </label>
                <input v-model="car.acceleration" id="car-acceleration" type="number" step="0.1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.acceleration">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Engine -->
            <div class="mb-3">
                <label for="car-engine" class="block font-medium text-sm text-gray-700">
                    Engine
                </label>
                <input v-model="car.engine" id="car-engine" type="number" step="1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.engine">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Drivetrain -->
            <div class="mb-3">
                <label for="car-drivetrain" class="block font-medium text-sm text-gray-700">
                    Drivetrain
                </label>

                <select v-model="car.drivetrain" name="car-drivetrain" id="car-drivetrain" class="rounded-xl w-32">
                    <option v-for="drivetrain in drivetrains">{{ drivetrain }}</option>
                </select>

                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.drivetrain">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="mb-3">
                <label for="car-images" class="block font-medium text-sm text-gray-700">
                    Images
                </label>
                <input
                    @change="getImage"
                    id="car-images"
                    type="file"
                    class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    multiple
                >
                <hr class="mt-2">
                <div class="inline-flex mr-2" v-for="(image, key) in car.images" :key="key">
                    <div class="flex flex-col">
                        <img :src="'/images/' + image" alt="" width="200" class="rounded mt-2"><br>
                        <button
                            @click.prevent="removeImage(key)"
                            class="bg-red-500 rounded-xl mb-2 py-2 hover:bg-red-600"
                        >Remove image</button>
                    </div>
                </div>

                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.images">
                        {{ message }}
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="car-description" class="block font-medium text-sm text-gray-700">
                    Description
                </label>
                <textarea
                    name="car-description"
                    id="car-description"
                    rows="5"
                    cols="60"
                    v-model="car.description"
                    class="rounded-xl w-full md:w-auto"
                ></textarea>
                <div class="text-red-600 mt-1">
                    <div v-for="message in validationErrors?.description">
                        {{ message }}
                    </div>
                </div>
            </div>
            <!-- Buttons -->
            <div class="mt-4">
                <button :disabled="isLoading" class="w-full md:w-auto px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl disabled:opacity-75 disabled:cursor-not-allowed">
                    <div v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></div>
                    <span v-if="isLoading">Processing...</span>
                    <span v-else class="px-4">Save</span>
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import { useRoute } from "vue-router";
import useCars from "../../../composables/cars";

const route = useRoute();

// Preview images
const getImage = (e) => {
    const selectedFiles = e.target.files;
    for (let i = 0; i < selectedFiles.length; i++) {
        let img = {
            src: URL.createObjectURL(selectedFiles[i]),
            file: selectedFiles[i]
        }
        car.value.images.push(img)
    }
}

const removeImage = (index) => {
    car.value.images.splice(index, 1);
};

const fuels = ['Benzyna', 'Diesel', 'Elektryk'];
const drivetrains = ['RWD', 'FWD', 'AWD'];

const { car, updateCar, getCar, isLoading, validationErrors } = useCars();
onMounted(getCar(route.params.id))

</script>
