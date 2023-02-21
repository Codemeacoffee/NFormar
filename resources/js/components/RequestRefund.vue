<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 offset-0 mb-4">
                <h1 class="text-center"><b>Formulario de desistimiento</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 offset-0 mb-4">
                <h5 class="mb-4">Bienvenido al formulario de desistimiento de <b>NFormar</b>, si desea solicitar el desistimiento de uno de sus productos puede hacerlo de dos formas:</h5>
                <ul>
                    <li class="mb-4">
                        <p><b>En formato físico:</b> Si desea solicitar el desistimiento de uno de sus productos en formato físico puede hacerlo descargando
                        <a target="_blank" v-bind:href="refundDocument"><b>este documento</b></a>, rellenandolo y enviandolo a la siguiente dirección:
                            <b>Calle Gran Canaria, 70 - 35600 Puerto del Rosario</b>.</p>
                    </li>
                    <li>
                        <p><b>En formato digital:</b> Si desea solicitar el desistimiento de su producto en formato digital puede hacerlo rellenando el siguiente
                            formulario:
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 offset-0">
                <form method="post" v-bind:action="requestRefundFormLink">
                    <input class="HPInput" type="email" name="HPInput">
                    <div class="form-group mb-4">
                        <label for="name">Nombre*</label>
                        <input type="text" class="form-control mb-2" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">DNI*</label>
                        <input type="text" class="form-control mb-2" id="DNI" name="DNI" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="address">Dirección del/los consumidor(es) y usuario(s)*</label>
                        <input type="text" class="form-control mb-2" id="address" name="address" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="phone">Teléfono del/los consumidor(es) y usuario(s)*</label>
                        <input type="number" class="form-control mb-2" id="phone" name="phone" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email">Correo electrónico de/los consumidor(es) y usuario(s)*</label>
                        <input type="email" class="form-control mb-2" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Nº del pedido*</label>
                        <input type="number" class="form-control mb-2" id="code" name="code" aria-describedby="codeHelp" required>
                        <small class="text-secondary" id="codeHelp">*Puedes encontrar el código de tus pedidos en el apartado "Historial" de tu perfil.</small>
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo de producto(s) y descripción del/los mismo(s)</label>
                        <textarea class="form-control mb-2" id="type" name="type" rows="6"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="purchaseDate">Fecha en la que se realizó o suscribió el pedido*</label>
                        <input type="date" class="form-control mb-2" id="purchaseDate" name="purchaseDate" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="receivedDate">Fecha de recepción del pedido</label>
                        <input type="date" class="form-control mb-2" id="receivedDate" name="receivedDate">
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="acceptDataTreatment" id="acceptDataTreatmentCS" required>
                        <label class="form-check-label" for="acceptDataTreatmentCS">Acepto facilitar mis datos con la finalidad de realizar un desistimiento.</label>
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
    name: "RequestRefund",
    props: {
        csrf: String,
        requestRefundFormLink: String,
        privacyPolicyUrl: String,
        refundDocument: String
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
