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
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)


const messages = {
    en: {
        navbar: {
            main: 'Main',
            exit: 'Exit',
            contacts: 'Contacts',
            profile: 'Profile',
            enter: 'Enter',
            registration:'Registration',
        },
        signUp:{
            h1: 'Enter',
            href:'Not registered yet?'
        },
        form:{
            email:'Email:',
            password:'Password:',
            name:'Name:',
            surname:'Surname:',
            phone: 'Phone:',
            asked: 'Are you admin or user?',
            btnReg:'Registration',
            btnEnter:'Enter',
            nameAnimal:'Animal name:',
            address:'Address:',
            changeBtn:'Change',
            deleteBtn:'Delete',
            shelterName:'Shelter name:',
            ageAnimal:'Age animal:',
            typeAnimal:'Type animal:',
            createBtn:'Create',
            weightAnimal:'Weight animal:',
            sexAnimal:'Sex animal:',
            topicAnnouncement:'Topic announcement:',
            descriptionAnnouncement:'Description announcement:'
        },
        signIn:{
            banner:'Glad to welcome you to our ShelterHelper animal care system',
            h3:'Please register to use our system',
            title:'SingIn'
        },
        contacts:{
            h2:'Write to us',
            p:'Write or call us at the contacts below',
            message:'Message',
            btn:'Send',
            skype:'Скайп',
            telegram:'Телеграм'
        },
        shelter:{
            p:'We are very glad that you use our system and try to make a user-friendly interface',
            addAnimal:'Add animal',
            announcement:'Announcement',
            changeTitle:'Change shelter',
        },
        adminProfile:{
            aboutPerson:'Data about You',
            aboutShelter:'Data about shelter',
            changePerson:'Change data about yourself',
            changeShelter:'Change data about shelter',
        },
        user:{
            changeUser:'Change data about User',
            aboutUser:'Data about User',
            h1:'Dear friend, we are very glad that you have decided to use our system',
            p:'We have developed a convenient system so that you can quickly find the information you need:',
            li1:'Choose the right city and get all the shelters in it',
            li2:'View what animals are in it and find all the detailed information',
            li3:'Donate money for the needs of shelters',
            li4:'Find an animal you want to spend time with',
            h2:'You can use all this in our mobile application "ShelterHelper", which you can find in PlayMarket',
        },
        announcement:{
            announcementTitle:"Yours announcement",
            addAnnouncement:"Add announcement",
            createAnnouncement:"Create announcement",
        },
        animal:{
            animalTitle:'Enter info about animal',
            animalImg:'Img animal'
        }


    },
    ua: {
        navbar: {
            main: 'Головна',
            exit: 'Вихід',
            contacts: 'Контакти',
            profile: 'Профіль',
            enter: 'Вхід',
            registration:'Реєстрація',
        },
        signUp: {
            h1: 'Вхід',
            href:'Ще не зареєстровані?'
        },
        form:{
            email:'Електронна пошта:',
            password:'Пароль:',
            name:"Iм'я:",
            surname:'Прізвище:',
            phone: 'Номер телефону:',
            asked: 'Ви адмін чи користувач:',
            btnReg:'Зареєструватись',
            btnEnter:'Увійти',
            nameAnimal:'Кличка тварини:',
            address:'Адреса:',
            changeBtn:'Змінити',
            deleteBtn:'Видалити',
            createBtn:'Створити',
            shelterName:'Назва:',
            ageAnimal:'Вік тварини:',
            sexAnimal:'Стать тварини:',
            typeAnimal:'Вид тварини:',
            weightAnimal:'Вага тварини:',
            topicAnnouncement:"Тема об'яви:",
            descriptionAnnouncement:"Опис об'яви:",

        },
        signIn:{
            banner:'Раді вітати Вас у нашій системі допомоги тваринам ',
            h3:'Зареєструйтесь, будь-ласка, щоб користуватися нашою системою',
            title:'Зареєструватись'

        },
        contacts:{
            h2:'Напишіть нам',
            p:'Напишіть або наберіть нам за нижче вказаними контактами',
            message:'Повідомлення',
            btn:'Відправити',
            skype:'Скайп',
            telegram:'Телеграм'
        },
        shelter:{
            p:'Ми дуже раді, що ви користуєтесь нашою системою і намагаємося зробити зручний інтерфейс',
            addAnimal:'Додати тварину',
            announcement:"Об'яви",
            changeTitle:'Редагувати притулок',
        },
        adminProfile:{
            aboutPerson:'Дані про Вас',
            aboutShelter:'Дані про притулок',
            changePerson:'Змінити дані про себе',
            changeShelter:'Змінити дані про притулок',
        },
        user:{
            changeUser:'Змінення даних користувача',
            aboutUser:'Дані про Вас',
            h1:'Дорогий друже, ми дуже раді, що ти вирішив скористуватися нашою системою',
            p:'Щоб ти зміг швидко знаходити потрібну інформацію, ми розробили зручну систему:',
            li1:'Обрати потрібне місто та отримати усі притулки в ньому',
            li2:'Переглянути які є в ньому тварини та знайти усю детальну інформацію',
            li3:'Задонатити гроші на потреби притулків',
            li4:'Знайти тваринку з якою ви хочете провести час',
            h2:'Все це ти зможешь використовувати в нашому мобільному додатку "ShelterHelper", який ви можете знайти в PlayMarket',
        },
        announcement:{
            announcementTitle:"Ваші об'яви",
            addAnnouncement:"Дати об'яву",
            createAnnouncement:"Створити об'яву",
        },
        animal:{
            animalTitle:'Внести дані про тварину',
            animalImg:'Фото тварини'
        }
    }
}


const i18n = new VueI18n({
    locale: 'en', // set locale
    messages, // set locale messages
})

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
    i18n,
    el: '#app',
});

const navbar = new Vue({
    i18n,
    el: '#navbar',
})

if(localStorage.getItem('locale') !== null) {
    i18n.locale = localStorage.getItem('locale');
}
