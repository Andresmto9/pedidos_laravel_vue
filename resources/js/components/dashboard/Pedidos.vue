<script>
    import PedidosModal from './PedidosModal.vue';
    import ProductosModal from './ProductosModal.vue';
    export default {
        name: 'Pedidos',
        components: {
            ProductosModal,
            PedidosModal,
        },
        data() {
            return {
                showModalPedido: false,
                showModalProducto: false,
                pedidos: '',
                productos: '',
                usuarios: '',
            };
        },
        watch: {
            showModalPedido(newVal) {
                console.log('showModalPedido cambió:', newVal);
            }
        },
        mounted(){
            this.getInfoSistema();
        },
        methods:{
            getInfoSistema(){
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
                        let dataProd = '';
                        $.each(response.data.producto, function (key, value) {
                            dataProd += `
                                <div class="col-span-12 md:col-span-3 mx-2">
                                    <div class="m-10 flex flex-col items-center mx-auto max-w-screen-lg">
                                        <div class="grid w-full gap-10 h-64">
                                            <div class="bg-white w-full rounded-lg shadow-md flex flex-col transition-all overflow-hidden hover:shadow-2xl">
                                                <div class="  p-6">
                                                    <div class="pb-3 mb-4 border-b border-stone-200 text-xs font-medium flex justify-between text-blue-900">
                                                        <span class="flex items-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                                                            </svg>
                                                            ${(value.producto_valor)}
                                                        </span>
                                                    </div>
                                                    <h3 class="mb-4 font-semibold  text-2xl"><a href="" class="transition-all text-blue-900 hover:text-blue-600">${value.producto_nombre}</a></h3>
                                                    <div class="overflow-auto">
                                                        <p class="text-sky-800 text-sm mb-0">
                                                            ${value.producto_descripcion}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                            console.log(value)
                        })
                        this.productos = dataProd;
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
    <div class='items-center justify-center mt-5'>
        <ul class="mx-auto grid max-w-full w-full grid-cols-3 gap-x-5 px-8">
            <li class="">
                <input class="peer sr-only" type="radio" value="yes" name="answer" id="yes" checked />
                <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out" for="yes">Pedidos</label>
                <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 md:ml-5">
                    <div class="grid place-items-center grid-cols-12">
                        <div class="col-span-12 grid w-full">
                            <div class="mb-4 text-center col-end-12 col-span-2">
                                <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="showModalPedido = true">
                                    Crear pedido
                                </button>
                            </div>
                            <div class="text-center col-span-12 mb-5" v-html="pedidos"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <PedidosModal :mostrarPedidoModal.sync="showModalPedido"></PedidosModal>
                    </div>
                    <div class="relative flex flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">

                    </div>
                </div>
            </li>

            <li class="">
                <input class="peer sr-only" type="radio" value="no" name="answer" id="no" />
                <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out" for="no">Productos</label>
                <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 md:ml-5">
                    <div class="grid place-items-center grid-cols-12">
                        <div class="col-span-12 grid w-full">
                            <div class="mb-4 text-center col-end-12 col-span-2">
                                <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="showModalProducto = true">
                                    Crear producto
                                </button>
                            </div>
                            <div class="grid grid-cols-12 col-span-12" v-html="productos"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <ProductosModal :mostrarProductoModal.sync="showModalProducto"></ProductosModal>
                    </div>
                </div>
            </li>

            <li class="">
                <input class="peer sr-only" type="radio" value="yesno" name="answer" id="yesno" />
                <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out " for="yesno">Usuarios</label>
                <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 md:ml-5">
                    <div class="col-span-12 grid w-full">
                        <div class="mb-4 text-center col-end-12 col-span-2">
                            <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                Crear usuario
                            </button>
                        </div>
                        <div class="text-center col-span-12 mb-5" v-html="usuarios"></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
