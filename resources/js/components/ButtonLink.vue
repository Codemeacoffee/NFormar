<template>
    <a v-bind:href="link">
        <button type="button" v-bind:class="[css, 'btn']">
            <b>{{text}}</b>
        </button>
    </a>
</template>

<script>
export default {
    name: "ButtonLink",
    props: {
        link: String,
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
