<template>
    <div class="container-fluid position-relative">
        <div class="row py-5">
            <div class="col-lg-4 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0 my-lg-5 my-md-2 my-md-0">
                <h1 class="text-white"><b>{{textBig}}</b></h1>
                <h4 class="text-white my-3">{{text}}</h4>
                <button-link
                    :link="link"
                    :text="buttonText"
                    :css="css"
                ></button-link>
            </div>
        </div>
        <div class="layer position-absolute w-100 h-100"></div>
        <img v-bind:alt="bannerAlt" v-bind:src="bannerImage" class="w-100 h-100 position-absolute bannerImg">
    </div>
</template>

<script>
import ButtonLink from "./ButtonLink";
export default {
    name: "Banner",
    components: {ButtonLink},
    props: {
        bannerAlt: String,
        bannerImage: String,
        link: String,
        buttonText: String,
        css: String,
        textBig: String,
        text: String
    }
}
</script>

<style scoped>
    .bannerImg, .layer{
        left: 0;
        top: 0;
    }

    .bannerImg{
        object-fit: cover;
        z-index: -2;
    }

    .layer{
        background-color: #141C2A;
        opacity: 65%;
        z-index: -1;
    }
</style>
