<template>
    <button type="button" v-bind:class="[css, 'btn']" data-toggle="modal" v-bind:data-target="modal">
        <b>{{text}}</b>
    </button>
</template>

<script>
    export default {
        name: "ButtonModal",
        props: {
            modal: String,
            text: String,
            css: String
        }
    }
</script>

<style scoped>
    .btn{
        border-radius: 0;
    }

    .red{
        background-color: #D50006;
        color: white;
    }

    .red:hover{
        background: #9b0000;
    }
</style>
