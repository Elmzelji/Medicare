/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Bus = new Vue();

Vue.component('remove-record', require('./components/models/remove.vue').default);

Vue.component('navbar-admin', require('./components/dashboard/navbar.vue').default);
Vue.component('dashboard-stats', require('./components/dashboard/dashboard_stats.vue').default);
Vue.component('loader', require('./components/dashboard/loader.vue').default);
Vue.component('alert', require('./components/dashboard/alert.vue').default);
Vue.component('quick-reply', require('./components/dashboard/quick-reply/quick_reply.vue').default);
Vue.component('gender', require('./components/dashboard/gender.vue').default);



Vue.component('patients', require('./components/patients/patientsComponent.vue').default);
Vue.component('patient-create', require('./components/patients/create.vue').default);
Vue.component('patient-infos', require('./components/patients/patientComponent.vue').default);

Vue.component('document-create', require('./components/MH/create.vue').default);
Vue.component('document-show', require('./components/MH/show.vue').default);

Vue.component('accord', require('./components/settings/accord.vue').default);
Vue.component('input-symbole', require('./components/settings/symbole_input.vue').default);


const app = new Vue({
    el: '#app',
});