<template>
    <nav class="navbar navbar-expand-lg sticky-top shadow-lg py-4">
        <a class="navbar-brand mr-5" v-bind:href="logoLink">
            <img v-bind:src="logo" v-bind:alt="logoAlt">
        </a>
        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#responsiveContent" aria-controls="responsiveContent" aria-expanded="false" aria-label="Mostrar instrumentos de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="responsiveContent">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item mr-4">
                    <a class="text-white d-block p-2" v-bind:href="coursesLink">Cursos</a>
                </li>
                <li class="nav-item mr-4">
                    <a class="text-white d-block p-2" v-bind:href="purchasesLink">Compras</a>
                </li>
            </ul>
            <div class="d-flex justify-content-between">
                <button-link
                     :link="closeSession"
                     text="Cerrar sesión"
                     css="red"
                ></button-link>
            </div>
        </div>
    </nav>
</template>

<script>
import ButtonLink from "./ButtonLink";
export default {
    name: "AdminNavigationBar",
    components: {ButtonLink},
    props: {
        logo: String,
        logoAlt: String,
        logoLink: String,
        coursesLink: String,
        purchasesLink: String,
        closeSession: String,
    }
}
</script>

<style scoped>
    nav{
        padding: 0 7vw;
    }

    .navbar{
        background-color: #0E2130;
    }

    .navbar-brand img{
        width: 12rem;
    }

    .navbar .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }

    .navbar .navbar-toggler{
        border-color: rgb(255,255,255);
    }

    a:hover{
        text-decoration: none;
    }
</style>
