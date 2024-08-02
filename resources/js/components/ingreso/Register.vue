<script>
    export default {
        name: 'Register',
        data() {
            return {

            };
        },
    }
</script>

<template>
    <div>
        <div class="mx-auto container flex items-center" id="nav">
            <div class="w-full pt-2 p-4">
                <div class="mx-auto md:p-6 md:w-1/2">
                    <div class="flex flex-wrap justify-between">
                        <h1 class="text-2xl text-teal-500 hover:text-teal-500 transition duration-500 p-4">
                            <i class="fas fa-sign-in-alt fa-fw fa-lg"></i>
                            Registrarse
                        </h1>
                    </div>

                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-8">
                            <label for="usuaRegiNomb" class="block text-gray-700 text-sm font-bold mb-2">
                                <span class="text-red-500">&nbsp;*</span>
                                Nombre
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input id="usuaRegiNomb" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out" placeholder="correo@ejemplo.com" />
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="usuaRegiCorre" class="block text-gray-700 text-sm font-bold mb-2">
                                <span class="text-red-500">&nbsp;*</span>
                                Correo
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input id="usuaRegiCorre" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out" placeholder="correo@ejemplo.com" />
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="usuaRegiPass" class="block text-gray-700 text-sm font-bold mb-2">
                                <span class="text-red-500">&nbsp;*</span>
                                Contraseña
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <input name="usuaRegiPass" id="usuaRegiPass" type="text" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="usuaRegiConfPass" class="block text-gray-700 text-sm font-bold mb-2">
                                <span class="text-red-500">&nbsp;*</span>
                                Confirmar contraseña
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <input name="usuaRegiConfPass" id="usuaRegiConfPass" type="text" class="block pr-10 shadow appearance-none border-2 border-teal-100 rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal-500 transition duration-500 ease-in-out">
                            </div>
                        </div>

                        <div class="mb-4 text-center">
                            <button class="transition duration-500 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Ingresar
                            </button>
                        </div>
                        <hr>
                        <div class="mt-8">
                            <p class="text-sm">
                                <a class="font-bold text-sm text-teal-500 hover:text-teal-800 cursor-pointer" @click="$emit('mostrar-registro')">
                                    Ingresar
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
