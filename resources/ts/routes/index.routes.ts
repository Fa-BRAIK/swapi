import { createRouter, createWebHistory } from 'vue-router';

import HomePage from '../pages/HomePage.vue';
import PeoplePage from '../pages/PeoplePage.vue';
import PlanetsPage from '../pages/PlanetsPage.vue';
import StarshipsPage from '../pages/StarshipsPage.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: HomePage, name: 'index' },
        { path: '/people', component: PeoplePage, name: 'people' },
        { path: '/planets', component: PlanetsPage, name: 'planets' },
        { path: '/starships', component: StarshipsPage, name: 'starships' }
    ]
})

export default router
