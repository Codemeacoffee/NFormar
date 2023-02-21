<template>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title w-100 text-center" id="loginModal"><b>Iniciar sesión</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" class="px-lg-4 px-1 pb-3" v-bind:action="formUrl">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="loginEmail">Correo</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Contraseña</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <a v-bind:href="forgotPasswordUrl"><small class="text-secondary">¿Has olvidado tu contraseña?</small></a>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn"><b>Acceder</b></button>
                    </div>
                    <input v-if="loginForwardedTo" type="hidden" name="forwardedTo" v-bind:value="loginForwardedTo">
                    <input type="hidden" name="_token" v-bind:value="csrf">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LoginModal",
    props: {
        csrf: String,
        formUrl: String,
        forgotPasswordUrl: String,
        loginForwardedTo: String
    },
    mounted() {
        if(this.loginForwardedTo) $('#login').modal('show');
    }
}
</script>

<style scoped>
    .btn{
        border-radius: 0;
        background-color: #D50006;
        color: white;
    }

    .modal-header{
        border-bottom: none;
    }

    .modal-footer{
        display: block;
        border-top: none;
    }
</style>

