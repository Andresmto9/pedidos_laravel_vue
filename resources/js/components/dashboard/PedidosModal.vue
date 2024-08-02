<!-- Modal.vue -->
<template>
    <div v-if="mostrarModal" class="modal-overlay" @click="close">
        <div class="modal-content" @click.stop>
            <button class="close-button" @click="close">X</button>
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            mostrarModal: {
                type: Boolean,
                default: false
            }
        },
        emits: ['update:mostrarModal'],
        methods: {
            close() {
                this.$emit('update:mostrarModal', false);
            }
        }
    }
</script>

<style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal-content {
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
