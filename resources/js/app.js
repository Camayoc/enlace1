/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    methods: {
        log(data) {
            console.log(data)
        }
    },
    mounted() {
        console.log("asdas");
    },
});

import ExampleComponent from "./components/ExampleComponent.vue";
import InputLabel from "./components/InputLabel.vue";
import LinksManager from "./components/LinksManager.vue";
import CompletingLink from "./components/CompletingLink.vue";
import UploadPhoto from "./components/UploadPhoto.vue";
import ProfileUpload from "./components/ProfileUpload.vue";
import ProfileUpload2 from "./components/ProfileUpload2.vue";
import HeaderUpload from "./components/HeaderUpload.vue";
import ModalComponent from "./components/ModalComponent.vue";
import Upload2 from "./components/Upload2.vue";
app.component("example-component", ExampleComponent);
app.component("completing-link", CompletingLink);
app.component("upload-foto", UploadPhoto);
app.component("input-label", InputLabel);
app.component("links-manager", LinksManager);
app.component("profile-upload", ProfileUpload);
app.component("profile-upload2", ProfileUpload2);
app.component("header-upload", HeaderUpload);
app.component("modal-component", ModalComponent);
app.component("upload2", Upload2);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount("#app");
