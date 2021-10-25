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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('documents-list', require('./components/DocumentsList.vue').default);
Vue.component('document', require('./components/Document.vue').default);
Vue.component('projects-list', require('./components/ProjectsList.vue').default);
Vue.component('project', require('./components/Project.vue').default);
Vue.component('board', require('./components/Board.vue').default);
Vue.component('reports', require('./components/Reports.vue').default);
Vue.component('sign-up', require('./components/SignUp.vue').default);
Vue.component('sign-in', require('./components/SignIn.vue').default);
Vue.component('create-document', require('./components/CreateDocument.vue').default);
Vue.component('create-project', require('./components/CreateProject.vue').default);
Vue.component('create-report', require('./components/CreateReport.vue').default);
Vue.component('not-auth', require('./components/NotAuth.vue').default);
Vue.component('not-such-documents', require('./components/NotSuchDocuments.vue').default);
Vue.component('not-such-projects', require('./components/NotSuchProjects.vue').default);
Vue.component('not-such-projects-documents', require('./components/NotSuchProjectsDocuments.vue').default);
Vue.component('notify-create-project', require('./components/notifications/CreateProjectNotification.vue').default);
Vue.component('notify-delete-project', require('./components/notifications/DeleteProjectNotification.vue').default);
Vue.component('notify-create-document', require('./components/notifications/CreateDocumentNotification.vue').default);
Vue.component('notify-delete-document', require('./components/notifications/DeleteDocumentNotification.vue').default);
Vue.component('create-card', require('./components/CreateCard.vue').default);

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


