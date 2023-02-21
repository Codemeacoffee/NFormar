<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 offset-0 mb-4">
                <h1 class="text-center"><b>Reestablece tu contraseña</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 offset-0 mb-4">
                <h5>Introduce tu nueva contraseña en el siguiente formulario:</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 offset-0">
                <form method="post" v-bind:action="resetPasswordLink">
                    <div class="form-group mb-5">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <small class="text-danger">La contraseña debe tener al menos 8 caracteres y debe contener un número y una mayúscula.</small>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn"><b>Enviar</b></button>
                    </div>
                    <input type="hidden" name="_token" v-bind:value="csrf">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ResetPassword",
    props: {
        csrf: String,
        resetPasswordLink: String
    }
}
</script>

<style scoped>
.root{
    margin-bottom: 6rem;
}

.btn{
    border-radius: 0;
    background-color: #D50006;
    color: white;
}
</style>
