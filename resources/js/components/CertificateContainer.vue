<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12 offset-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-12 offset-0 mb-lg-0 mb-5">
                            <h3 class="mb-4"><b>{{title}}</b></h3>
                            <div v-html="content"></div>
                        </div>
                        <div class="col-lg-4 offset-lg-1 col-12 offset-0">
                            <img class="w-100 shadow-lg" v-bind:alt="imageAlt" v-bind:src="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CertificateContainer",
    props: {
        title: String,
        content: String,
        image: String,
        imageAlt: String
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .container-fluid >>> p{
        margin-bottom: 0;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
