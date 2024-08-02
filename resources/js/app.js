import './bootstrap';
import './jquery';
import './sweetalert';
import { createApp } from 'vue'
import Login from '@/components/ingreso/Login.vue'
import Register from '@/components/ingreso/Register.vue'

window.app = createApp({
    setup() {
        return {
            message: 'Vue.js',
        };
    },
    data() {
        return {
            mostrarIngreso: true,
            mostrarRegistron : false
        };
    },
    components: {
        Login,
        Register
    },
}).mount('#app');
