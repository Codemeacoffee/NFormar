<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 offset-0">
                <a v-bind:href="link">
                    <img class="w-100" v-bind:alt="imageAlt" v-bind:src="imageSrc">
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Innobonos",
    props: {
        imageSrc: String,
        imageAlt: String,
        link: String
    }
}
</script>


<style scoped>
    .root{
        margin-bottom: 6rem;
        background-color: white;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
