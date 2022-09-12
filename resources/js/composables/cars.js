import {inject, ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useCars() {
    const cars = ref({});
    const car = ref({});
    const rent = ref({});
    const rents = ref({});
    const router = useRouter();
    const validationErrors = ref({});
    const isLoading = ref(false);
    const swal = inject('$swal');

    const getCars = async () => {
        axios.get('/api/cars')
            .then(response => {
                cars.value = response.data
            })
    };

    const getCarBySlug = async (slug) => {
            await axios.get('/api/car/' + slug)
                .then(response => {
                    car.value = response.data.data
                })
                .catch(error => {
                    router.push({ name: 'home' })
                    swal({
                        icon: 'error',
                        title: 'Something went wrong'
                    })
                })
    };

    const getRents = async () => {
        axios.get('/api/rents')
            .then(response => {
                rents.value = response.data
            })
    };

    const getCar = async (id) => {
        axios.get('/api/cars/' + id)
            .then(response => {
                car.value = response.data.data
            })
    };


    const storeCar = async (car) => {
        axios.post('/api/admin/cars', car, {
            headers: {
                'Content-Type': "multipart/form-data"
            }
        })
            .then(response => {
                router.push({ name: 'admin.index' })
                swal({
                    icon: 'success',
                    title: 'Car added successfully'
                })
            })
    };

    const updateCar = async (car) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/admin/cars/' + car.id, car)
            .then(response => {
                router.push({ name: 'admin.index' })
                swal({
                    icon: 'success',
                    title: 'Car updated successfully'
                })
            })
            .catch(error => {
                if (error.response?.data)
                {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    };

    const setAvailableCar = async (car) => {
        axios.put('/api/admin/cars/' + car.id + '/available', car)
            .then(response => {
                router.push({ name: 'admin.index' })
                getCars();
            })
    };

    const setUnAvailableCar = async (car) => {
        axios.put('/api/admin/cars/' + car.id + '/unavailable', car)
            .then(response => {
                router.push({ name: 'admin.index' })
                getCars();
            })
    };

    const addFavorite = async (car, user) => {
        axios.post('/api/cars/' + car.id + '/add-favorite', {car, user})
            .then(response => {
                router.push({ name: 'cars.index' })
                getCars();
            })
    };

    const removeFavorite = async (car, user) => {
        axios.delete('/api/cars/' + car + '/remove-favorite/' + user)
            .then(response => {
                router.push({ name: 'cars.index' })
                getCars();
            })
    };

    const deleteCar = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/admin/cars/' + id)
                        .then(response => {
                            getCars()
                            router.push({name: 'admin.index'})
                            swal({
                                icon: 'success',
                                title: 'Car deleted successfully'
                            })
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })
    }

    const storeRent = async (rent) => {
        axios.post('/api/rents', rent)
            .then(response => {
                router.push({ name: 'cars.index' })
                swal({
                    icon: 'success',
                    title: 'Car rent successfully'
                })
            })
    };

    const deleteRent = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/rents/' + id)
                        .then(response => {
                            getRents()
                            router.push({name: 'admin.rents'})
                            swal({
                                icon: 'success',
                                title: 'Car deleted successfully'
                            })
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })
    }

    return {
        cars,
        car,
        getCars,
        getCarBySlug,
        getCar,
        storeCar,
        updateCar,
        setAvailableCar,
        setUnAvailableCar,
        deleteCar,
        rents,
        rent,
        getRents,
        storeRent,
        deleteRent,
        validationErrors,
        isLoading,
        addFavorite,
        removeFavorite
    }
}
