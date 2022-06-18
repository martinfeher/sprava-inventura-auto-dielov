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
        <main class="col-12 col-md-9 col-xl-8 px-5 py-4 pl-md-5 mb-4 my-4 container">
            <div class="d-flex justify-content-end mb-3">
                <div class="add-item-btn px-3 py-2">
                    <router-link :to="{ name: 'cars.create' }" class="">Pridať auto</router-link>
                </div>
            </div>
            <div class="overflow-auto align-middle">
                <table>
                    <thead class="table-header"> 
                        <tr>
                            <th class="text-start px-3 py-2">Id</th>
                            <th class="text-start px-3 py-2">Názov</th>
                            <th class="text-center px-3 py-2">Registrované</th>
                            <th class="text-center px-3 py-2">Registračné číslo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="item in cars" :key="item.id">
                            <tr class="border-bottom">
                                <td class="text-start px-3 py-2">
                                    {{ item.id }}
                                </td>
                                <td class="text-start px-3 py-2">
                                    {{ item.name }}
                                </td>
                                <td class="text-center px-3 py-2">
                                    {{ item.is_registered ? 'áno' : 'nie' }} 
                                </td> 
                                <td class="text-center px-3 py-2">
                                    {{ item.registration_number }} 
                                </td>   
                                <td class="text-center px-3 py-2">
                                    <span class="px-1 edit-icon" title="Upraviť"><router-link :to="{ name: 'cars.edit', params: { id: item.id } }"><i class="fa-solid fa-pen-to-square"></i></router-link></span>
                                    <span class="px-2 delete-icon" title="Vymazať" @click="deleteCar(item.id)"><i class="fa-solid fa-trash-can"></i></span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</template>

<script>
import useCars from '../../composables/cars'
import { onMounted } from 'vue';

export default {
    setup() {
        const { cars, getCars, destroyCar } = useCars()

        onMounted(getCars)

        const deleteCar = async (id) => {   // delete Car function with user confirmation and following reload of the data
            if (!window.confirm('Ste si istý, že si prajete vymazať auto s id ' + id + '?')) {
                return
            }

            await destroyCar(id)    // delete data with id 
            await getCars()     // data reload
        }


        return {
            cars,
            deleteCar
        }
    }
}
</script>