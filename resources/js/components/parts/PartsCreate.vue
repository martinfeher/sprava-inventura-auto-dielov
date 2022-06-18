<template>
    <div class="page-index">
        <header class="header">
            <nav id="navbar" class="nav">
                <ul class="mb-0">
                    <li class="list-inline-item">
                        <router-link :to="{ name: 'cars.index' }" class="nav-link">Autá</router-link>
                    </li>
                    <li class="list-inline-item">
                        <router-link :to="{ name: 'parts.index' }" class="nav-link active">Diely</router-link>
                    </li>
                </ul>
            </nav>
       </header>
        <main class="col-12 col-md-9 col-xl-8 px-5 py-4 mb-4 my-4 container">
             <div class="mb-3">
                <h3>Nový diel</h3>
            </div>
            <hr/>
            <form class="mt-3" @submit.prevent="savePart">
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
                                v-model="form.name">
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="serialnumber" class="">Sériové číslo</label>
                        <div class="mt-1">
                            <input type="text" name="serialnumber" id="serialnumber"
                                class="w-100 px-2 py-1"
                                v-model="form.serialnumber">
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="car_id" class="">ID auta</label>
                        <div class="mt-1">
                            <input type="text" name="car_id" id="car_id"
                                class="w-100 px-2 py-1"
                                v-model="form.car_id">
                        </div>
                    </div>
                </div>
                <button type="submit" class="create-item-btn px-3 py-2 mt-2">Vytvoriť</button>
            </form>
        </main>
    </div>
</template>

<script>
import useParts from '../../composables/parts'
import { reactive } from 'vue'

export default {
    setup() {
        const form = reactive({
            name: '',
            serialnumber: '',
            car_id: '',
        })

        const { errors, storePart } = useParts()

        const savePart = async () => {
            await storePart({ ...form })
        }

        return {
            form,
            errors,
            savePart
        }
    }
}
</script>