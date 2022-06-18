import './bootstrap';

import { createApp } from 'vue';
import router from './router'

import CarsIndex from './components/cars/CarsIndex.vue';
import PartsIndex from './components/parts/PartsIndex.vue';
  
createApp({
    components: { 
        CarsIndex,
        PartsIndex
    }
}).use(router).mount('#app')