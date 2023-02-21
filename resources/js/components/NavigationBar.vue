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
                    <dropdown
                        text="Conócenos"
                        id="aboutUsDropdown"
                        css="navbar-dropdown"
                        :items="aboutUsContents"
                    ></dropdown>
                </li>
                <li class="nav-item mr-4">
                    <dropdown
                        text="Cursos"
                        id="coursesDropdown"
                        css="navbar-dropdown"
                        :items="categoriesContents"
                    ></dropdown>
                </li>
                <li class="nav-item mr-4">
                    <a class="text-white d-block p-2" v-bind:href="contactLink">Contacto</a>
                </li>
            </ul>
            <div class="d-flex justify-content-between mt-lg-0 mt-3">
                <div class="position-relative">
                    <img class="cart cursor-pointer mr-5" alt="Icono representando un carrito de la compra" v-on:click="showCart" v-bind:src="cartImg">
                    <div class="cartContainer d-none position-absolute">
                        <div class="imageContainer text-right">
                            <span class="bgColor d-lg-inline-block d-none h-100 cursor-pointer" v-on:click="hideCart">
                                 <img class="cart m-4" alt="Icono representando un carrito de la compra" v-bind:src="cartImg">
                            </span>
                            <h2 class="bgColor d-lg-none d-block h-100 cursor-pointer text-white px-4 py-2 mb-0" v-on:click="hideCart">×</h2>
                        </div>
                        <div class="bgColor h-100 px-lg-4 px-0 py-3">
                            <h2 class="text-center text-white borderBottom pb-3 mb-3"><b>Resumen del carrito</b></h2>
                            <div v-if="cartContents.totalPrice > 0">
                                <div class="innerContainer container-fluid justify-content-around">
                                    <div v-for="content in cartContents.courses" class="row w-100 mb-3 borderBottom">
                                        <div class="col-lg-8 col-12">
                                            <p class="text-white"><b>{{content.name}}</b></p>
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <p class="text-white">{{content.price}}</p>
                                        </div>
                                        <div class="col-lg-1 col-12">
                                            <a v-bind:href="removeFromCartLink+'/'+content.id"><h4 class="text-white d-lg-block d-none">&times;</h4><p class="text-danger d-lg-none d-block"><b>Eliminar del carrito</b></p></a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-center text-white mb-3"><b>Total:</b> {{cartContents.displayPrice}}</h5>
                                <form method="get" v-bind:action="paymentGatewayLink">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="acceptTermsAndConditions" required>
                                        <label class="form-check-label text-white mb-3" for="acceptTermsAndConditions">
                                            <small>
                                                He leído y acepto los <a target="_blank" v-bind:href="termsAndConditionsLink"><b>Terminos y condiciones</b></a> y la
                                                <a target="_blank" v-bind:href="refundsLink"><b>política de devoluciones</b></a>
                                            </small>.
                                        </label>
                                    </div>
                                    <div class="text-center">
                                       <button type="submit" class="btn red"><b>Comprar</b></button>
                                    </div>
                                </form>
                            </div>
                            <div v-else>
                                <h5 class="text-white text-center mb-3">
                                    El carrito está actualmente vacío.
                                </h5>
                                <div class="text-center">
                                    <button-link
                                        :link="coursesLink"
                                        text="Ver cursos"
                                        css="red"
                                    ></button-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-white mt-2 mr-5 cursor-pointer text-center" v-if="!session" data-toggle="modal" data-target="#login">Iniciar sesión</span>
                <button-link v-if="session"
                    :link="homeLink"
                    text="Mi perfil"
                    css="red"
                ></button-link>
                <button-modal v-else
                    data-target="#register"
                    text="Regístrate"
                    css="red"
                ></button-modal>
            </div>
        </div>
    </nav>
</template>

<script>
import Dropdown from "./Dropdown";
import ButtonModal from "./ButtonModal";
import ButtonLink from "./ButtonLink";
export default {
    name: "NavigationBar",
    components: {ButtonLink, ButtonModal, Dropdown},
    props: {
        logo: String,
        logoAlt: String,
        logoLink: String,
        aboutUsContents: Array,
        categoriesContents: Array,
        paymentGatewayLink: String,
        refundsLink: String,
        termsAndConditionsLink: String,
        contactLink: String,
        coursesLink: String,
        removeFromCartLink: String,
        cartImg: String,
        homeLink: String,
        session: Boolean,
        cartContents: Object,
        cartOpen:Boolean
    },
    mounted() {
        if(this.cartOpen){
            $('.navbar-toggler').trigger('click');
            this.showCart();
        }
    },
    methods:{
        showCart: function (){
            $('.cartContainer').removeClass('d-none').addClass('d-block');
        },
        hideCart: function (){
            $('.cartContainer').removeClass('d-block').addClass('d-none');
        }
    }
}
</script>

<style scoped>
    nav{
        padding: 0 7vw;
    }

    .btn{
        border-radius: 0;
    }

    .red{
        background-color: #D50006;
        color: white;
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

    .cursor-pointer{
        cursor: pointer;
    }

    .cart{
        width: 2rem;
    }

    .cartContainer{
        top: -24px;
        right: 24px;
        width: 30rem;
    }

    .bgColor{
        background-color: #2D455D;
    }

    .innerContainer{
        max-height: 20rem;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .imageContainer img{
        margin-bottom: 35px !important;
    }

    .borderBottom{
        border-bottom: 2px solid white;
    }

    span{
        white-space: nowrap;
    }

    @media screen and (max-width: 992px) {
        .cartContainer{
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
        }
    }
</style>
