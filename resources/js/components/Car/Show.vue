<template>
    <div class="mb-8">
        <div>
            <vueper-slides fade :touchable="false">
                <vueper-slide
                    v-for="image in car.images"
                    :image="'/images/' + image"
                />
            </vueper-slides>
        </div>

        <div class="text-center mt-10">
            <span class="text-white bg-black text-2xl px-2 py-1 rounded-2xl">{{ car.name }} - Specyfikacja</span>
        </div>
        <div
            class="mt-8 m-auto w-[26rem]
                md:w-[40rem] md:grid md:grid-cols-3 md:gap-4"
        >
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/ios/50/000000/engine.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Moc</div>
                    <div class="col-span-12 font-bold"><span>{{ car.horsepower }} KM</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/external-phatplus-lineal-phatplus/64/000000/external-turbo-motor-car-phatplus-lineal-phatplus.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Moment obrotowy</div>
                    <div class="col-span-12 font-bold"><span>{{ car.torque }} NM</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/ios/100/000000/car-seat.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Liczba miejsc</div>
                    <div class="col-span-12 font-bold"><span>{{ car.seats }}</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/external-others-inmotus-design/67/000000/external-Gears-gears-others-inmotus-design-6.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Skrzynia</div>
                    <div class="col-span-12 font-bold"><span>{{ car.gearbox }}</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/ios-filled/100/000000/speedometer.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Przyśpieszenie</div>
                    <div class="col-span-12 font-bold"><span>{{ car.acceleration }} s / 100 km/h</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/external-those-icons-fill-those-icons/96/000000/external-fuel-cars-components-those-icons-fill-those-icons.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Rodzaj paliwa</div>
                    <div class="col-span-12 font-bold"><span>{{ car.fuel }}</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/ios/100/000000/calendar--v1.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Rok</div>
                    <div class="col-span-12 font-bold"><span>{{ car.year }}</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/ios/50/000000/engine.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Pojemność silnika</div>
                    <div class="col-span-12 font-bold"><span>{{ car.engine }} ccm³</span></div>
                </div>
            </div>
            <div class="bg-neutral-400 rounded-2xl p-2 drop-shadow-xl mb-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="row-span-2"><img src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-wheels-car-parts-and-service-icongeek26-outline-icongeek26.png" class="w-12 mr-2" alt=""/></div>
                    <div class="col-span-12">Napęd</div>
                    <div class="col-span-12 font-bold"><span>{{ car.drivetrain }}</span></div>
                </div>
            </div>
        </div>
        <div class="text-center mt-10">
            <span class="text-white bg-black text-2xl px-2 py-1 rounded-2xl">{{ car.name }} - Dostępność</span>
        </div>
        <div class="text-center text-6xl p-10">
            Kalendarz
            <br><br>
            <hr>
            <br>
            Cennik
            <br>
        </div>

<!--        <div class="flex justify-center items-center mb-5">-->
<!--            <div class="w-72 px-7 py-4 rounded-xl mr-3 shadow-xl">-->
<!--                <div class="mb-2 font-bold text-center text-xl">Wynajem</div>-->
<!--                <div>1 - 2 dni</div>-->
<!--                <div>3 - 5 dni</div>-->
<!--                <div>6 - 7 dni</div>-->
<!--                <div>8 - 14 dni</div>-->
<!--                <div>15 - 21 dni</div>-->
<!--                <div>22 - 28 dni</div>-->
<!--                <div>28 + dni</div>-->
<!--            </div>-->
<!--            <div class="w-72 px-7 py-4 rounded-xl mr-3 shadow-xl font-bold">-->
<!--                <div class="mb-2 font-bold text-center text-xl">Cena</div>-->
<!--                <div>{{ car.price }} zł / doba</div>-->
<!--                <div>{{ car.price * 0.9 }} zł / doba</div>-->
<!--                <div>{{ car.price * 0.8 }} zł / doba</div>-->
<!--                <div>{{ car.price * 0.65 }} zł / doba</div>-->
<!--                <div>{{ car.price * 0.5 }} zł / doba</div>-->
<!--                <div>{{ car.price * 0.4 }} zł / doba</div>-->
<!--                <div>{{ car.price * 0.3 }} zł / doba</div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="flex justify-center items-center mb-5" v-for="(value, key) in values">-->
<!--            <div class="w-72 px-7 py-4 rounded-xl mr-3 shadow-xl">-->
<!--                <div class="mb-2 font-bold text-center text-xl">Liczba dni</div>-->
<!--                <div>{{ key }}</div>-->
<!--            </div>-->
<!--            <div class="w-72 px-7 py-4 rounded-xl mr-3 shadow-xl font-bold">-->
<!--                <div class="mb-2 font-bold text-center text-xl">Cena</div>-->
<!--                <div>{{ value * car.price }} zł / doba</div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="flex justify-center items-center mb-5">
            <div class="w-72 px-7 py-4 rounded-xl mr-5 shadow-2xl shadow-emerald-400 text-center">
                <div class="text-2xl font-bold mb-2">Liczba dni</div>
                <div v-for="(value, key) in values">
                    <div class="mb-1">{{ key }}</div>
                </div>
            </div>
            <div class="w-72 px-7 py-4 rounded-xl shadow-2xl shadow-emerald-400 shadow-xl text-center">
                <div class="text-2xl font-bold mb-2">Cena</div>
                <div v-for="(value, key) in values">
                    <div class="mb-1">{{ value * car.price }} zł / doba</div>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center text-center">
            <form @submit.prevent="storeRent(rent)">
                <div>
                    <input type="datetime-local" v-model="rent.starts" class="mr-5 rounded-xl" :placeholder="rent.starts">
                    <input type="datetime-local" v-model="rent.ends" class="rounded-xl">
                </div>

                <div class="bg-red-500 px-4 py-2 rounded-xl mt-4" v-if="rent.starts < today">Data wsteczna!</div>
                <div class="mt-5 text-xl">
                    <div v-if="days < 0">
                        <p class="bg-red-500 px-4 py-2 rounded-xl ">Data końcowa nie może być mniejsza niż początkowa!</p>
                    </div>
                    <div v-else-if="days > 31">
                        <p class="bg-green-500 px-4 py-2 rounded-xl">Wynajem powyżej 31 dni - cena ustalana indywidualnie.</p>
                    </div>
                    <div v-else-if="!isNaN(days) && days !== 0 && rent.starts >= today">
                        <span class="mr-1">*</span>{{ Math.round(toPay(Math.ceil(days)) * car.price) }} zł
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-4" v-if="days <= 31 && days > 0 && rent.starts >= today">
                    <button class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl disabled:opacity-75 disabled:cursor-not-allowed">
                        <span class="px-2">Wynajmij</span>
                    </button>
                    <br>
                    <small>* Każda rozpoczęta godzina nowego dnia naliczana jest jako pełna doba.</small>
                </div>

            </form>
        </div>
        <div class="text-center mt-10">
            <span class="text-white bg-black text-2xl px-2 py-1 rounded-2xl">{{ car.name }} - Opis</span>
        </div>
        <div class="md:w-[40rem] w-full m-auto">
            <p class="mt-5 ml-5 mr-5">{{ car.description }}</p>
        </div>
    </div>
</template>

<script setup>
import useCars from "../../composables/cars";
import {computed, onMounted, ref} from "vue";
import {useRoute} from "vue-router";
import { VueperSlides, VueperSlide } from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'

const route = useRoute();
const { car, getCarBySlug, storeRent } = useCars();

onMounted(async () => {
    await getCarBySlug(route.params.slug)
});

const date = new Date();
const today = date.getFullYear() + '-0' + (date.getMonth() + 1) + '-' + date.getDate() + 'T' + ((date.getHours() < 10 ? '0' : '') + date.getHours()) + ':' + ((date.getMinutes() < 10 ? '0' : '') + date.getMinutes());

const rent = ref({
    car: route.params.slug,
    user_id: '',
    starts: today,
    ends: today,
});

const values = {
    '1 - 2': 1,
    '3 - 5': 0.9,
    '6 - 7': 0.8,
    '8 - 14': 0.65,
    '15 - 21': 0.5,
    '22 - 28': 0.4,
    '29 - 31': 0.3,
};

let arr = [];

const data = ref({
    num1: 0,
    num2: 0,
    operand: ''
})

const days = computed( () => {
    const date1 = new Date(rent.value.starts).getTime();
    const date2 = new Date(rent.value.ends).getTime();
    return (date2 - date1) / 1000 / 3600 / 24;
});

const toPay = (d) => {
    let r = 0;
    Object.keys(values).forEach(key => {
        const strArray = key.split(' - ');
        if (d >= strArray[0] && d <= strArray[1]) {
            console.log(d);
            r = values[key] * d;
        }
    })
    return r;
};

const result = computed( () => {
    switch(data.value.operand) {
        case "+":
            return data.value.num1 + data.value.num2
        case "-":
            return data.value.num1 - data.value.num2
        case "*":
            return data.value.num1 * data.value.num2
        case "/":
            return data.value.num1 / data.value.num2
    }
});

</script>
