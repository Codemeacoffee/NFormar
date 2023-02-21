<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <p>
                    <b>ESCUELA DE HOSTELERÍA EUROPEA, S.L.</b> utiliza cookies propias para el correcto funcionamiento técnico de nuestra
                    página web, y de terceros para realizar un seguimiento estadístico y anónimo de nuestros usuarios.
                    <a v-bind:href="cookiesPolicyLink"><b>Más información</b></a>
                </p>
                <p>
                    Haciendo clic en <b>"Aceptar todas"</b> aceptas tanto las cookies propias como las de terceros, mientras que haciendo
                    click en <b>"Rechazar todas"</b> rechazas todas las cookies excepto aquellas que son extrictamente necesarias para el
                    funcionamiento de nuestra página web. También puedes elegir manualmente que cookies aceptar y cuales no haciendo clic
                    en <b>"Configurar"</b>.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-md-block d-flex justify-content-between text-center">
                <button-link
                    :link="cookiesAcceptLink"
                    text="Aceptar todas"
                    css="red mr-4"
                ></button-link>
                <button-link
                    :link="cookiesDenyLink"
                    text="Rechazar todas"
                    css="red mr-4"
                ></button-link>
                <button-link
                    :link="cookiesConfigurationLink"
                    text="Configurar"
                    css="red"
                ></button-link>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonLink from "./ButtonLink";
export default {
    name: "CookiesPopUp",
    components: {ButtonLink},
    props: {
        cookiesAcceptLink: String,
        cookiesDenyLink: String,
        cookiesPolicyLink: String,
        cookiesConfigurationLink: String,
    }
}
</script>

<style scoped>
    .container-fluid{
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 1025;
        background-color: #0E2130;
    }

    .container-fluid p{
        color: #fff;
    }

    @media (max-width: 992px){
        .container-fluid{
            top: 0;
            overflow: scroll;
        }
    }
</style>
