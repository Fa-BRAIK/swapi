import { createRouter, createWebHistory } from 'vue-router';

import HomePage from '../pages/HomePage.vue';
import SearchPage from '../pages/SearchPage.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: HomePage, name: 'index' },
        { path: '/search', component: SearchPage, name: 'search' }
    ]
})

export default router
