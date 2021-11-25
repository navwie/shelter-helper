/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import 'material-icons/iconfont/material-icons.css';

//defined as global component
Vue.component('V-MaterialIcon', require('vue-materials-icon/MaterialIcon').default);


Vue.component('navbar', require('./components/Navbar.vue').default);

Vue.component('sign-up', require('./components/SignUp.vue').default);
Vue.component('sign-in', require('./components/SignIn.vue').default);

Vue.component('admin-profile', require('./components/AdminProfile.vue').default);

Vue.component('user-page', require('./components/UserPage.vue').default);
Vue.component('user-profile', require('./components/UserProfile.vue').default);
Vue.component('user-change-data', require('./components/UserChangeData.vue').default);

Vue.component('shelter', require('./components/Shelter.vue').default);
Vue.component('create-shelter', require('./components/CreateShelter.vue').default);
Vue.component('edit-shelter', require('./components/EditShelter.vue').default);

Vue.component('announcement', require('./components/Announcement.vue').default);
Vue.component('create-announcement', require('./components/CreateAnnouncement.vue').default);

Vue.component('contacts', require('./components/Contacts.vue').default);

Vue.component('main-page', require('./components/Main').default);
Vue.component('announcement-card', require('./components/AnnouncementCard').default);
Vue.component('create-animal', require('./components/CreateAnimal.vue').default);
Vue.component('edit-animal', require('./components/EditAnimal.vue').default);
Vue.component('animal-card', require('./components/AnimalCard.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const navbar = new Vue({
    el: '#navbar',
})
