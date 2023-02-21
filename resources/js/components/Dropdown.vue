<template>
    <div v-bind:class="[css, 'dropdown d-inline-block']">
        <button class="btn dropdown-toggle p-2" type="button" v-bind:id="id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ text }}</button>
        <div class="dropdown-menu px-4" v-bind:aria-labelledby="id">
            <a class="dropdown-item mb-3" v-bind:href="item.link" v-for="item in items"><span>{{item.text}}</span></a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Dropdown",
    props: {
        text: String,
        css: String,
        id: String,
        items: Array
    }
}
</script>

<style scoped>
    .btn{
        box-shadow: none;
    }

    .navbar-dropdown button, .navbar-dropdown a{
        color: white;
    }

    .navbar-dropdown a{
        padding: 0;
    }

    .navbar-dropdown a span{
        padding-bottom: .2rem;
    }

    .navbar-dropdown a:hover{
        background-color: transparent;
    }

    .navbar-dropdown a:hover span{
        border-bottom: 1px solid white;
    }

    .navbar-dropdown .dropdown-menu{
        background-color: #2D455D;
        border-radius: 0;
        padding: 1.2rem 0 .5rem 0;
    }

</style>
