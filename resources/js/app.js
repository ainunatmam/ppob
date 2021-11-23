/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('sidebar', require('./components/Sidebar.vue').default);

import IndexProduct from './components/product/Index.vue';
import CreateProduct from './components/product/Create.vue';
import EditProduct from './components/product/Edit.vue';
import IndexCategory from './components/category/Index.vue';
import CreateCategory from './components/category/Create.vue';
import EditCategory from './components/category/Edit.vue';
import IndexCustomer from './components/customer/Index.vue';
import CreateCustomer from './components/customer/Create.vue';
import EditCustomer from './components/customer/Edit.vue';
import IndexTransaction from './components/transaction/Index.vue';
import CreateTransaction from './components/transaction/Create.vue';
// import Sidebar from './components/Sidebar.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const routes = [
    {
        name: 'product-index',
        path: '/product',
        component: IndexProduct
    },
    {
        name: 'product-create',
        path: '/product/create',
        component: CreateProduct
    },
    {
        name: 'product-edit',
        path: '/product/edit/:id',
        component: EditProduct
    },
    {
        name: 'category-index',
        path: '/category',
        component: IndexCategory
    },
    {
        name: 'category-create',
        path: '/category/create',
        component: CreateCategory
    },
    {
        name: 'category-edit',
        path: '/category/edit/:id',
        component: EditCategory
    },
    {
        name: 'customer-index',
        path: '/customer',
        component: IndexCustomer
    },
    {
        name: 'customer-create',
        path: '/customer/create',
        component: CreateCustomer
    },
    {
        name: 'customer-edit',
        path: '/customer/edit/:id',
        component: EditCustomer
    },
    {
        name: 'transaction-index',
        path: '/transaction',
        component: IndexTransaction
    },
    {
        name: 'transaction-create',
        path: '/transaction/create',
        component: CreateTransaction
    },

];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

