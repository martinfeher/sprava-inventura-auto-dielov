<template>
    <div class="page-index">
        <header class="header">
            <nav id="navbar" class="nav">
                <ul class="mb-0">
                    <li class="list-inline-item">
                        <router-link :to="{ name: 'cars.index' }" class="nav-link active">Autá</router-link>
                    </li>
                    <li class="list-inline-item">
                        <router-link :to="{ name: 'parts.index' }" class="nav-link">Diely</router-link>
                    </li>
                </ul>
            </nav>
        </header>
        <main class="col-12 col-md-9 col-xl-8 px-5 py-4 mb-4 my-4 container">
            <div class="mb-3">
                <h3>Upraviť auto</h3>
            </div>
            <hr/>
            <form class="mt-3" v-on:submit.prevent="saveCar">
                <div v-if="errors" class="errors">
                    <div v-for="(v, k) in errors" :key="k" class="bg-danger mt-3 py-2 px-3">
                        <small v-for="error in v" :key="error" class="mb-0">
                        {{ error }}
                        </small>
                    </div>
                </div>
                <div>
                    <div class="my-3">
                        <label for="name" class="">Názov</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                class="w-100 px-2 py-1"
                                v-model="car.name">
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="">Registrované</div>
                        <div class="mt-1">
                            <div class="block_is_registered block_is_registered_yes">
                                <label for="is_registered_yes" class="label_is_registered">áno</label>
                                <input type="radio" id="is_registered_yes" value="1" v-model="car.is_registered">
                            </div>
                            <div class="block_is_registered block_is_registered_no">
                                <label for="is_registered_no" class="label_is_registered">nie</label>
                                <input type="radio" id="is_registered_no" value="0" v-model="car.is_registered">
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="registration_number" class="">Registračné číslo</label>
                        <div class="mt-1">
                            <input type="text" name="registration_number" id="registration_number"
                                class="w-100 px-2 py-1"
                                v-model="car.registration_number">
                        </div>
                    </div>
                </div>
                <button type="submit" class="create-item-btn px-3 py-2 mt-2">
                    Upraviť
                </button>
            </form>
        </main>
    </div>
</template>

<script>
import useCars from '../../composables/cars'
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, car, updateCar, getCar } = useCars()

        onMounted(() => getCar(props.id))

        const saveCar = async () => {
            await updateCar(props.id)
        }

        return {
            errors,
            car,
            saveCar
        }
    }
}
</script>