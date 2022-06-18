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
        <main class="col-12 col-md-9 col-xl-8 px-5 py-4 pl-md-5 mb-4 my-4 container">
            <div class="d-flex justify-content-end mb-3">
                <div class="add-item-btn px-3 py-2">
                    <router-link :to="{ name: 'parts.create' }" class="">Pridať diel</router-link>
                </div>
            </div>
            <div class="overflow-auto align-middle">
                <table>
                    <thead class="table-header"> 
                        <tr>
                            <th class="text-start px-3 py-2">Id</th>
                            <th class="text-start px-3 py-2">Názov</th>
                            <th class="text-center px-3 py-2">Sériové číslo</th>
                            <th class="text-center px-3 py-2">ID auta</th>
                            <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <template v-for="item in parts" :key="item.id">
                            <tr class="border-bottom">
                                <td class="text-start px-3 py-2">
                                    {{ item.id }}
                                </td>
                                <td class="text-start px-3 py-2">
                                    {{ item.name }}
                                </td>
                                <td class="text-center px-3 py-2">
                                    {{ item.serialnumber }} 
                                </td> 
                                <td class="text-center px-3 py-2">
                                {{ item.car_id }} 
                            </td>   
                            <td class="text-center px-3 py-2">
                                <span class="px-1 edit-icon" title="Upraviť"><router-link :to="{ name: 'parts.edit', params: { id: item.id } }"><i class="fa-solid fa-pen-to-square"></i></router-link></span>
                                <span class="px-2 delete-icon" title="Vymazať" @click="deletePart(item.id)"><i class="fa-solid fa-trash-can"></i></span>
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
import useParts from '../../composables/parts'
import { onMounted } from 'vue';

export default {
    setup() {
        const { parts, getParts, destroyPart } = useParts()

        onMounted(getParts)

        const deletePart = async (id) => {   // delete Part function with user confirmation and following reload of the data
            if (!window.confirm('Ste si istý, že si prajete vymazať diel s id ' + id + '?')) {
                return
            }

            await destroyPart(id)    // delete data with id 
            await getParts()     // data reload
        }


        return {
            parts,
            deletePart
        }
    }
}
</script>