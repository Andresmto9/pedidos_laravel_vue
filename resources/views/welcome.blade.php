<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba Ticker Shop</title>

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 antialiased bg-slate-300">
        <div id="app">
            <div class="col-span-12">
                <login v-show="mostrarIngreso" @mostrar-ingreso="mostrarIngreso = false; mostrarRegistro = true"></login>
                <register v-show="mostrarRegistro" @mostrar-registro="mostrarIngreso = true; mostrarRegistro = false"></register>
            </div>
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
