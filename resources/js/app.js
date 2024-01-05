require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue';

import { createRouter, createWebHistory } from 'vue-router';

import IndexPengunjung from './components/pengunjung/IndexPengunjung.vue';
import SavePengunjung from './components/pengunjung/SavePengunjung.vue';
import DeletePengunjung from './components/pengunjung/DeletePengunjung.vue';

import Books from './components/Books.vue';

const routes = [
    {
        name: 'index',
        path: '/',
        component: IndexPengunjung
    },
    {
        name: 'save',
        path: '/save',
        component: SavePengunjung
    },
    {
        name: 'delete',
        path: '/delete',
        component: DeletePengunjung
    },
    {
        name: 'books',
        path: '/books',
        component: Books
    }
];

const router = createRouter({
    history: createWebHistory(), // Menghapus parameter null
    routes
});

createApp(App).use(router).mount('#app');
