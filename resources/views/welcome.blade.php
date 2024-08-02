<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba Ticker Shop</title>

        <style>
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: grid;
                justify-content: center;
                align-items: center;
            }
            .modal-content {
                width: 80%;
                height: 80% auto;
                background: white;
                padding: 20px;
                border-radius: 4px;
                position: relative;
            }
            .close-button {
                position: absolute;
                top: 10px;
                right: 10px;
                border: none;
                background: none;
                cursor: pointer;
                font-size: 20px;
            }
        </style>

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 antialiased bg-slate-300">
        <div id="app">
            <div class="col-span-12">
                <login v-if="mostrarIngreso == true && !isAuthenticated" @mostrar-ingreso="mostrarIngreso = false; mostrarRegistro = true" @login-success="handleLoginSuccess"></login>
                <register v-else-if="mostrarRegistro && !isAuthenticated" @mostrar-registro="mostrarIngreso = true; mostrarRegistro = false"></register>
                <pedidos v-else></pedidos>
            </div>
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
