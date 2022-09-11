import { createRouter, createWebHistory } from 'vue-router';
import App from '../layouts/App.vue';
import CarIndex from '../components/Car/Index.vue';
import CarShow from '../components/Car/Show.vue';
import AdminMain from '../components/Admin/Admin.vue';
import AdminCarIndex from '../components/Admin/Car/Index.vue';
import AdminRentIndex from '../components/Admin/Rent/Index.vue';
import AdminCarCreate from '../components/Admin/Car/Create.vue';
import AdminCarEdit from '../components/Admin/Car/Edit.vue';

const routes = [
    {
        path: '/',
        redirect: { name: 'cars.index' },
        component: App,
        children: [
            {
                path: '/cars',
                name: 'cars.index',
                component: CarIndex
            },
            {
                path: '/car/:slug',
                name: 'car.show',
                component: CarShow,
            }
        ]
    },
    {
        redirect: { name: 'admin.index' },
        path: '/admin',
        name: 'admin',
        component: AdminMain,
        children: [
            {
                path: '/admin/cars',
                name: 'admin.index',
                component: AdminCarIndex,
            },
            {
                path: '/admin/car/add',
                name: 'admin.cars.add',
                component: AdminCarCreate,
            },
            {
                path: '/admin/car/edit/:id',
                name: 'admin.cars.edit',
                component: AdminCarEdit,
            },
            {
                path: '/admin/rents',
                name: 'admin.rents',
                component: AdminRentIndex
            },
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
});

export default router
