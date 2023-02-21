<template>
    <div class="container-fluid root">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6 offset-lg-1 col-12 offset-0">
                <div class="floating-container position-absolute">
                    <img class="w-100 h-100 shadow-lg" v-bind:alt="imageAlt" v-bind:src="image">
                    <div class="layer w-100 h-100 position-absolute"></div>
                </div>
            </div>
            <div class="col-lg-4 col-12 px-0">
                <div class="container-fluid bordered-box p-4">
                    <div class="row">
                        <div class="col-lg-8 col-12 offset-lg-4 offset-0">
                            <h1 class="mb-4"><b>{{title}}</b></h1>
                            <h4 class="mb-4"><b>{{text}}</b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContentContainerRight",
    props: {
        title: String,
        text: String,
        image: String,
        imageAlt: String
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 15rem;
    }

    .bordered-box{
        border: .5rem solid #D50915;
    }

    img{
        object-fit: cover;
    }

    .layer{
        left: 0;
        top: 0;
        background-color: #141C2A;
        opacity: 65%;
    }

    .floating-container{
        left: 0;
        right: -8vw;
        bottom: -8rem;
        top: 3rem;
        z-index: 1;
    }

    @media screen and (max-width: 992px) {
        .root{
            margin-bottom: 2rem;
        }

        .floating-container{
            position: relative !important;
            right: 0;
            bottom: 0;
            top: 0;
        }

        .bordered-box{
            border: none;
        }
    }
</style>
