import './bootstrap';
import './jquery';
import './sweetalert';
import './datatable';
import { createApp } from 'vue'
import Login from '@/components/ingreso/Login.vue'
import Register from '@/components/ingreso/Register.vue'
import Pedidos from '@/components/dashboard/Pedidos.vue'
import PedidosModal from '@/components/dashboard/PedidosModal.vue'

window.app = createApp({
    setup() {
        return {
            message: 'Vue.js',
        };
    },
    data() {
        return {
            mostrarIngreso: true,
            mostrarRegistron : false,
            isAuthenticated: false
        };
    },
    created() {
        this.checkAuthentication();
    },
    methods: {
        checkAuthentication() {
            this.isAuthenticated = localStorage.getItem('authenticated') === 'true';
        },
        handleLoginSuccess() {
            this.isAuthenticated = true;
        }
    },
    components: {
        Login,
        Register,
        Pedidos,
        PedidosModal
    },
}).mount('#app');
