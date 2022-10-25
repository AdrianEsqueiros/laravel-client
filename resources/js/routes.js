
import { createRouter, createWebHistory } from "vue-router";

const Home = ()=> import ('./components/Home.vue');

//importamos los componentes para el Client
const Create = ()=> import ('./components/client/Create.vue');
const Show = ()=> import ('./components/client/Show.vue');
const Edit = ()=> import ('./components/client/Edit.vue');

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes:[
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        name:'createClients',
        path:'/create',
        component:Create
    },
    {
        name:'showClients',
        path:'/clients',
        component:Show
    },
    {
        name:'editClient',
        path:'/edit/:id',
        component:Edit
    },
]})

export default router;
