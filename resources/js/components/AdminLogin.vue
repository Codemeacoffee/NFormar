<template>
    <div>
        <div class="adminLogin w-100">
            <div class="position-absolute formContainer bg-white px-5 py-4 rounded shadow-lg">
                <h2 class="text-center mb-4"><b>¡Bienvenido/a!</b></h2>
                <form method="post" v-bind:action="formUrl">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn"><b>Acceder</b></button>
                    </div>
                    <input type="hidden" name="_token" v-bind:value="csrf">
                </form>
            </div>
            <img class="w-100 h-100" v-bind:alt="layerImageAlt" v-bind:src="layerImageSrc">
            <div class="layer position-absolute w-100 h-100"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminLogin",
    props: {
        csrf: String,
        formUrl: String,
        layerImageSrc: String,
        layerImageAlt: String
    }
}
</script>

<style scoped>
    .adminLogin{
        height: 100vh;
    }

    .formContainer{
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
        background-color: white;
        width: 30rem;
    }

    .adminLogin img{
        object-fit: cover;
    }

    .layer{
        left: 0;
        top: 0;
        background-color: #0E2130;
        opacity: .65;
    }

    h2{
        color: #D50006;
    }

    .btn{
        background-color: #D50006;
        color: white;
        border-radius: 0;
    }

    @media screen and (max-width: 500px) {
        .formContainer {
            width: 100%;
            height: 100vh;
            border-radius: 0 !important;
            left: 0;
            top: 0;
            transform: none;
        }
    }
</style>
