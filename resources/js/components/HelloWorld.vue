<template>
    <div>
        <h1 class="text-3xl font-bold underline">
            Hola mundo :D
        </h1>
    </div>
</template>

<script>
    export default {
        name: 'HelloWorld',
        async mounted() {
            console.log("Hola", ":D")
        }
    }
</script>
