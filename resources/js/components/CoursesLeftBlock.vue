<template>
    <div class="col-xl-3 offset-xl-1 col-lg-4 col-12 offset-0 root">
        <div class="categoriesContainer p-4">
            <h4 class="mb-3"><b>Categorías</b></h4>
                <div class="form-check mb-3" v-for="category in categories">
                    <input class="form-check-input" v-on:click="link(category.url)" type="checkbox" v-bind:name="category.name" v-bind:id="category.id" v-bind:checked="category.checked">
                    <label class="form-check-label" v-bind:for="category.id">{{category.name}}</label>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CoursesLeftBlock",
    props: {
        filterFormUrl: String,
        categories: Array,
    },
    methods:{
        link: function (url){
            document.location.href = url;
        }
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .categoriesContainer{
        border: 8px solid #D50006;
        position: sticky;
        top: 12rem;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
