<template>
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center w-100" id="registerModal"><b>Crear Cuenta</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" class="px-lg-4 px-1 pb-3" v-bind:action="formUrl">
                    <input class="HPInput" type="email" name="HPInput">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="registerName">Nombre</label>
                            <input type="text" class="form-control" id="registerName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="registerSurnames">Apellidos</label>
                            <input type="text" class="form-control" id="registerSurnames" name="surnames" required>
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Correo electrónico</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword" name="password" aria-describedby="passwordHelp" required>
                            <small id="passwordHelp" class="form-text text-danger">La contraseña debe tener al menos 8 caracteres y debe contener un número y una mayúscula.</small>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="acceptPrivacyPolicy" id="acceptPrivacyPolicy" required>
                            <label class="form-check-label" for="acceptPrivacyPolicy">Acepto facilitar mis datos con la finalidad de crear una cuenta de usuario.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="advertising" id="registerAdvertising">
                            <label class="form-check-label" for="registerAdvertising">Quiero recibir ofertas y noticias de su entidad.</label>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn"><b>Regístrate</b></button>
                        </div>
                        <p class="text-justify">
                            <small>
                                <b>ESCUELA DE HOSTELERÍA EUROPEA, S.L.</b> con sede en <b>C/ GRAN CANARIA, Nº70, CP 35600, PUERTO DEL ROSARIO (Las Palmas)</b> le garantiza que sus
                                datos serán usados para poder atender sus solicitudes y prestarle nuestros servicios, incluyendo el comercio online. Solo le enviaremos
                                publicidad con su autorización previa, que podrá facilitarnos mediante la casilla correspondiente establecida al efecto. Únicamente trataremos
                                sus datos con su consentimiento previo, que podrá facilitarnos mediante la casilla correspondiente establecida al efecto. Sólo el personal de nuestra
                                entidad que esté debidamente autorizado podrá tener conocimiento de la información que le pedimos y no realizaremos cesiones ni transferencias de datos
                                de ningun tipo. Recuerde que tiene derecho a saber qué información tenemos sobre usted, corregirla y eliminarla, tal y como se explica en la información
                                adicional disponible en nuestra página web. Más información en el apartado <a target="_blank" v-bind:href="privacyPolicyUrl"><b>"POLÍTICA DE PRIVACIDAD"</b></a>
                                de nuestra página web.
                            </small>
                        </p>
                    </div>
                    <input type="hidden" name="_token" v-bind:value="csrf">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RegisterModal",
    props: {
        csrf: String,
        formUrl: String,
        termsAndConditionsUrl: String,
        privacyPolicyUrl: String
    },
}
</script>

<style scoped>
    .btn{
        border-radius: 0;
        background-color: #D50006;
        color: white;
    }

    .HPInput {
        display: block;
        line-height: 0;
        width: 0;
        height: 0;
        padding: 0;
        border: 0;
        overflow: hidden;
    }

    .modal-header{
        border-bottom: none;
    }

    .modal-footer{
        display: block;
        border-top: none;
    }
</style>
