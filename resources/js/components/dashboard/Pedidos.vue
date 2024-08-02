<script>
    import PedidosModal from './PedidosModal.vue';
    export default {
        name: 'Pedidos',
        components: {
            PedidosModal
        },
        data() {
            return {
                showModalPedido: false,
                pedidos: '',
                productos: '',
                usuarios: '',
            };
        },
        mounted(){
            this.prueba();
        },
        methods:{
            prueba(){
                axios({
                    method: 'post',
                    url: '/api/getInfoSistema',
                    headers :{
                        Authorization: `Bearer ${localStorage.getItem('token')}`,
                        Accept :'application/json',
                    },
                }).then((response) => {
                    if((response.data.pedido).length > 0){

                    }else{
                        this.pedidos = `
                            <div class="col-span-12 text-center">
                                <p class="text-lg font-medium">NO HAY PEDIDOS REGISTRADOS</p>
                            </div>
                        `
                    }

                    if((response.data.producto).length > 0){

                    }else{
                        this.productos = `
                            <div class="col-span-12 text-center">
                                <p class="text-lg font-medium">NO HAY PEDIDOS REGISTRADOS</p>
                            </div>
                        `
                    }

                    if((response.data.usuario).length > 0){
                        let dataUsua = ``
                        let arrUsua = response.data.usuario;
                        $.each(arrUsua, function(key, value){
                            dataUsua += `
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 w-2/6 text-center">${++key}</td>
                                    <td class="py-4 px-6 w-2/6 text-center">${value.nombre}</td>
                                    <td class="py-4 px-6 w-2/6 text-center">${value.email}</td>
                                </tr>
                            `;
                        })

                        this.usuarios = `
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 w-2/6 text-center">ID</th>
                                        <th scope="col" class="py-3 px-6 w-2/6 text-center">Nombre</th>
                                        <th scope="col" class="py-3 px-6 w-2/6 text-center">Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${dataUsua}
                                </tbody>
                            </table>
                        `;
                    }else{
                        this.usuarios = `
                            <div class="col-span-12 text-center">
                                <p class="text-lg font-medium">NO HAY USUARIOS REGISTRADOS</p>
                            </div>
                        `
                    }
                });
            }
        }
    }
</script>

<template>
    <div class='flex items-center justify-center min-h-screen'>
        <ul class="mx-auto grid max-w-full w-full grid-cols-3 gap-x-5 px-8">
            <li class="">
                <input class="peer sr-only" type="radio" value="yes" name="answer" id="yes" checked />
                <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out" for="yes">Pedidos</label>
                <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                    <div class="grid place-items-center grid-cols-12">
                        <div class="col-span-12 grid w-full">
                            <div class="mb-4 text-center col-end-12 col-span-2">
                                <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="setIngreUsua()">
                                    Crear pedido
                                </button>
                            </div>
                            <div class="text-center col-span-12 mb-5" v-html="pedidos"></div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="">
                <input class="peer sr-only" type="radio" value="no" name="answer" id="no" />
                <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out" for="no">Productos</label>
                <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                    <div class="grid place-items-center grid-cols-12">
                        <div class="col-span-12 grid w-full">
                            <div class="mb-4 text-center col-end-12 col-span-2">
                                <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="setIngreUsua()">
                                    Crear producto
                                </button>
                            </div>
                            <div class="text-center col-span-12 mb-5" v-html="productos"></div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="">
                <input class="peer sr-only" type="radio" value="yesno" name="answer" id="yesno" />
                <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out " for="yesno">Usuarios</label>
                <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                    <div class="col-span-12 grid w-full">
                        <div class="mb-4 text-center col-end-12 col-span-2">
                            <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="showModalPedido = true">
                                Crear usuario
                            </button>
                        </div>
                        <div class="text-center col-span-12 mb-5" v-html="usuarios"></div>
                    </div>
                    <PedidosModal :mostrarModal.sync="showModalPedido">
                        <h1>Contenido del Modal</h1>
                        <p>Este es un modal simple.</p>
                    </PedidosModal>
                </div>
            </li>
        </ul>
    </div>
</template>
