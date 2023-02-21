<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 offset-0 mb-4">
                <h1 class="text-center"><b>Atención al cliente</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 offset-0 mb-4">
                <h5>Si tienes alguna pregunta o comentario sobre nuestros productos, nuestro funcionamiento o cualquier otra cuestión, estaremos encantados de leerte y contestarte. Por favor, utiliza el formulario para escribirnos.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                <form method="post" v-bind:action="customerSupportFormLink">
                    <input class="HPInput" type="email" name="HPInput">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Asunto</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="message">Mensaje</label>
                        <textarea class="form-control" id="message" name="message" rows="8" required></textarea>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="acceptDataTreatment" id="acceptDataTreatmentCS" required>
                        <label class="form-check-label" for="acceptDataTreatmentCS">Acepto facilitar mis datos con la finalidad de recibir respuesta a mi solicitud de información.</label>
                    </div>
                    <div class="text-center mb-4">
                        <button type="submit" class="btn"><b>Enviar</b></button>
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
                    <input type="hidden" name="_token" v-bind:value="csrf">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CustomerSupport",
    props: {
        csrf: String,
        customerSupportFormLink: String,
        privacyPolicyUrl: String
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    textarea{
        resize: none;
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

    .btn{
        border-radius: 0;
        background-color: #D50006;
        color: white;
    }
</style>
