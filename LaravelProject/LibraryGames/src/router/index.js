import { createRouter, createWebHistory } from "vue-router";
import IndexView from '../views/IndexView.vue';
import SingleView from "../views/SingleView.vue";

const routes = [
    { path: '/', component:IndexView},
    { path: '/games/:id', component:SingleView, props:true}
    
]

export default createRouter({
    history: createWebHistory(),
    routes
})

