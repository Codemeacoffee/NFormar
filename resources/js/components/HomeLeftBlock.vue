<template>
    <div class="col-xl-3 offset-xl-1 col-lg-4 col-12 offset-0 root">
        <div class="categoriesContainer p-4">
            <div class="form-check mb-3" v-for="link in links">
                <h5><a v-bind:href="link.url" v-bind:class="link.css"><b>{{link.name}}</b></a></h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomeLeftBlock",
    props: {
        links: Array,
    },
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .categoriesContainer{
        border: 8px solid #D50006;
    }

    .selected{
        color: #2D455D;
    }

    .closeSession{
        color: #D50006;
        text-decoration: underline;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
