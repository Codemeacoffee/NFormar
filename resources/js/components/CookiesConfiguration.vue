<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12 offset-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-12">
                            <h1 class="mb-5"><b>Configuración de cookies</b></h1>
                            <p class="mb-5">
                                En cumplimiento de la ley, presentamos a continuación un panel que permite habilitar y deshabilitar las cookies que usa nuestra web,
                                solo permitimos controlar de esta forma aquellas cookies cuyo uso no sea estrictamente necesario para el funcionamiento de nuestra página web,
                                si necesitas más información acerca de las cookies que utilizamos puedes obtenerla en nuestra sección <a v-bind:href="cookiesPolicyLink"><b>POLÍTICA DE COOKIES.</b></a>
                            </p>
                            <div class="custom-control custom-switch px-5">
                                <input type="checkbox" v-on:change="toggleThirdPartyCookies" class="cookiesConfigField custom-control-input" id="googleAnalyticsSwitch" name="Google Analytics" v-bind:checked="checked">
                                <label class="custom-control-label" for="googleAnalyticsSwitch"><strong>Google Analytics</strong></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CookiesConfiguration",
    props: {
        cookiesPolicyLink: String,
        checked: Boolean,
        toggleThirdPartyCookiesUrl: String
    },
    methods: {
        toggleThirdPartyCookies: function (){
            window.location.href = this.toggleThirdPartyCookiesUrl;
        }
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 9rem;
    }

    .custom-switch {
        padding-left: 2.25rem;
    }

    .custom-control {
        position: relative;
        display: block;
        min-height: 1.5rem;
        padding-left: 1.5rem;
    }

    .custom-control-input {
        position: absolute;
        z-index: -1;
        opacity: 0;
    }

    .custom-control-label {
        position: relative;
        margin-bottom: 0;
        vertical-align: top;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
