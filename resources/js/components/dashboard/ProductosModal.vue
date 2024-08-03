<script>
    export default {
        data() {
            return {
                selectProd: '',
            };
        },
        props: {
            mostrarProductoModal: {
                default: false
            }
        },
        emits: ['update:mostrarProductoModal'],
        watcher: {
            close() {
                this.$emit('update:mostrarProductoModal', false);
            }
        },
        methods:{
            setProdData(){
                let vali = 0;

                $('.valiProd').each(function(){
                    if($(this).val() == "" || $(this).val() <= 0){
                        $(this).removeClass( "border-teal-100" ).addClass( "border-red-500" );
                        Swal.fire({
                            title: "¡UN MOMENTO!",
                            text: `Debe registrar ${$(this).data('titulo')} o validar la inforamción registrada.`,
                            icon: "error",
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText: 'Aceptar',
                        });
                        vali = 1;
                        return false;
                    }else{
                        $(this).removeClass( "border-red-500" ).addClass( "border-teal-100" );
                        vali = 0;
                    }
                })

                if(vali == 0){
                    axios({
                        method: 'post',
                        url: '/api/setProdData',
                        headers :{
                            Authorization: `Bearer ${localStorage.getItem('token')}`,
                            Accept :'application/json',
                        },
                        data: {
                            nombre: $("#prodNombCrea").val(),
                            precio: $("#prodValoCrea").val(),
                            descripcion: $("#prodDescCrea").val(),
                            iva: $("#prodIvaCrea").val()
                        }
                    }).then((response) => {
                        if(response.data.estado== "OK"){
                            Swal.fire({
                                title: "PERFECTO",
                                text: 'Se registor el producto con éxito.',
                                icon: "success",
                                confirmButtonText: "Aceptar",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }else{
                            Swal.fire({
                                title: "ERROR",
                                text: 'Ocurrió un problema al registrar el producto.',
                                icon: "errpr",
                                confirmButtonText: "Aceptar",
                            })
                        }
                    }, (error) => {
                        Swal.fire({
                            title: "ERROR",
                            text: 'Ocurrió un problema al registrar el producto.',
                            icon: "errpr",
                            confirmButtonText: "Aceptar",
                        })
                    });
                }
            }
        }
    }
</script>

<template>
    <div v-if="mostrarProductoModal" class="modal-overlay col-span-12" @click="close">
        <div class="modal-content" @click.stop>
            <button class="close-button mb-5" @click="close">X</button>
            <div class="grid grid-cols-12">
                <div class="col-span-12 mb-5">
                    <p class="text-md font-medium">Crear producto</p>
                </div>
                <div class="col-span-12">
                    <div class="mb-8">
                        <label for="prodNombCrea" class="block text-gray-700 text-sm font-bold mb-2">
                            <span class="text-red-500">&nbsp;*</span>
                            Nombre
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" id="prodNombCrea" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out valiProd" data-titulo="el valor del producto." />
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-8">
                        <label for="prodValoCrea" class="block text-gray-700 text-sm font-bold mb-2">
                            <span class="text-red-500">&nbsp;*</span>
                            Valor
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number" id="prodValoCrea" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out valiProd" data-titulo="el valor del producto." />
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-8">
                        <label for="prodIvaCrea" class="block text-gray-700 text-sm font-bold mb-2">
                            <span class="text-red-500">&nbsp;*</span>
                            Iva asociado el producto
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number" id="prodIvaCrea" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out valiProd" data-titulo="el valor del producto." />
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-8">
                        <label for="prodDescCrea" class="block text-gray-700 text-sm font-bold mb-2">
                            <span class="text-red-500">&nbsp;*</span>
                            Descripción
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea id="prodDescCrea" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out valiProd" data-titulo="el valor de la descripción."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <div class="mb-4 text-center">
                    <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="setProdData()">
                        Ingresar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
