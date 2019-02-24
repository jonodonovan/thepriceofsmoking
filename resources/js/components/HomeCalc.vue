<template>
    <div class="notification">
        <h3>{{ message }}</h3>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: 'hello'
            }
        }
    }
</script>

<style>
    .notification {
        background: grey;
    }
</style>
