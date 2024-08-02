<script>
    export default {
        data() {
            return {
                selectProd: '',
            };
        },
        props: {
            mostrarPedidoModal: {
                default: false
            }
        },
        emits: ['update:mostrarPedidoModal'],
        watcher: {
            close() {
                this.$emit('update:mostrarPedidoModal', false);
            }
        },
        mounted(){
            this.getProdSistema();
        },
        methods:{
            getProdSistema(){
                axios({
                    method: 'get',
                    url: '/api/getProdSistema',
                    headers :{
                        Authorization: `Bearer ${localStorage.getItem('token')}`,
                        Accept :'application/json',
                    },
                }).then((response) => {
                    if((response.data).length > 0){

                    }
                });
            }
        }
    }
</script>

<template>
    <div v-if="mostrarPedidoModal" class="modal-overlay col-span-12" @click="close">
        <div class="modal-content" @click.stop>
            <button class="close-button mb-5" @click="close">X</button>
            <div class="grid grid-cols-12">
                <div class="col-span-12 mb-5">
                    <p class="text-md font-medium">Crear pedido</p>
                </div>
                <div class="col-span-12">
                    <div class="mb-8">
                        <label for="usuaCorre" class="block text-gray-700 text-sm font-bold mb-2">
                            <span class="text-red-500">&nbsp;*</span>
                            Correo
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input id="usuaCorre" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out ingreUsua" placeholder="correo@ejemplo.com" data-titulo="el correo" />
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-8">
                        <label for="usuaCorre" class="block text-gray-700 text-sm font-bold mb-2">
                            <span class="text-red-500">&nbsp;*</span>
                            Productos
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out ingreUsua">
                                <option value="" selected>Seleccione un opción</option>
                                {{selectProd}}
                            </select>
                            <!-- <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input id="usuaCorre" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out ingreUsua" placeholder="correo@ejemplo.com" data-titulo="el correo" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
