import { createRouter, createWebHistory } from 'vue-router'

import CarsIndex from '../components/cars/CarsIndex.vue'
import CarsCreate from '../components/cars/CarsCreate.vue'
import CarsEdit from '../components/cars/CarsEdit.vue'
import PartsIndex from '../components/parts/PartsIndex.vue'
import PartsCreate from '../components/parts/PartsCreate.vue'
import PartsEdit from '../components/parts/PartsEdit.vue'

const routes = [
    {
        path: '/',
        name: 'cars.index',
        component: CarsIndex
    },
    {
        path: '/cars/create',
        name: 'cars.create',
        component: CarsCreate
    },
    {
        path: '/cars/:id/edit',
        name: 'cars.edit',
        component: CarsEdit,
        props: true
    },
    {
        path: '/parts',
        name: 'parts.index',
        component: PartsIndex
    },
    {
        path: '/parts/create',
        name: 'parts.create',
        component: PartsCreate
    },
    {
        path: '/parts/:id/edit',
        name: 'parts.edit',
        component: PartsEdit,
        props: true 
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})