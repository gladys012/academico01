
/*import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'*/
require('./bootstrap');

window.Vue = require('vue');
window.axios = axios;
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.component('notas_materia', require('./components/Notas_Materia.vue').default);
Vue.component('personas', require('./components/Personas.vue').default);
//Vue.component('analitos', require('./components/Analitos.vue').default);
Vue.component('rol', require('./components/Rol.vue').default);
Vue.component('user', require('./components/User.vue').default);
/*Vue.component('rol', require('./components/Rol.vue').default);
Vue.component('user', require('./components/User.vue').default);
*///Vue.component('prueba', require('./components/User.vue').default);
//Vue.component('solicitud2', require('./components/User.vue').default);


import swal from 'sweetalert2'
window.swal = swal;

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
//import './custom.scss';

import { BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue-icons.min.css'

Vue.use(BootstrapVueIcons)


const app = new Vue({
    el: '#app',
    data : {
        menu : 0,
        
    },
});
