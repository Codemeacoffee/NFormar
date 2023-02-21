<template>
    <div class="container-fluid root">
        <div class="col-lg-10 offset-lg-1 col-12 offset-0" v-html="content"></div>
    </div>
</template>

<script>
export default {
    name: "GenericBlock",
    props: {
        content: String,
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .container-fluid >>> p{
        margin-bottom: 0;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
