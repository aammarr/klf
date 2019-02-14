
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios); 

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

/*import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
*/
require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('widget-component', require('./components/WidgetComponent.vue'));

Vue.component('dashboard1-component', require('./components/DashboardComponent_1.vue'));

Vue.component('viewevent-component', require('./components/ViewEventComponent.vue'));
Vue.component('addevent-component', require('./components/AddEventComponent.vue'));

Vue.component('viewspeaker-component', require('./components/ViewSpeakerComponent.vue'));
Vue.component('addspeaker-component', require('./components/AddSpeakerComponent.vue'));

Vue.component('viewsponsor-component', require('./components/ViewSponsorComponent.vue'));
Vue.component('addsponsor-component', require('./components/AddSponsorComponent.vue'));

Vue.component('viewprize-component', require('./components/ViewPrizeComponent.vue'));
Vue.component('addprize-component', require('./components/AddPrizeComponent.vue'));

Vue.component('viewabout-component', require('./components/ViewAboutComponent.vue'));

Vue.component('viewuser-component', require('./components/ViewUserComponent.vue'));
Vue.component('data-table-component', require('./components/DatatableComponent.vue'));

Vue.component('logo-component', require('./components/LogoComponent.vue'));

const app = new Vue({
    el: '#app',
   
});