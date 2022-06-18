import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCars() {
    const car = ref([])
    const cars = ref([])

    const errors = ref('')
    const router = useRouter()

    const getCars = async () => {
        let response = await axios.get('/api/cars')  // retrieve data from endpoint get /api/cars
        cars.value = response.data.data
    }

    const getCar = async (id) => {
        let response = await axios.get(`/api/cars/${id}`)   // retrieve data from endpoint get /api/cars/{id}
        car.value = response.data.data
    }

    const storeCar = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/cars', data)  // send data to endpoint post /api/cars
            await router.push({name: 'cars.index'})
        } catch (e) {
            if (e.response.status === 422) {    // retrieve validation error message request with status 422
                errors.value = e.response.data.errors    // retrieve validation  error message data
            }
        }
    }

    const updateCar = async (id) => {
        errors.value = ''
        try {
            await axios.patch('/api/cars/' + id, car.value)  // send data to endpoint patch /api/cars/{id}
            await router.push({name: 'cars.index'})
        } catch (e) {
            if (e.response.status === 422) {    // retrieve validation error message request with status 422
               errors.value = e.response.data.errors    // retrieve validation  error message data
            }
        }
    }

    const destroyCar = async (id) => {
        await axios.delete(`/api/cars/${id}`)
    }

    return {
        errors,
        car,
        cars,
        getCar,
        getCars,
        storeCar,
        updateCar,
        destroyCar
    }

 

  
}