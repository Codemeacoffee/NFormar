<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-xl-4 col-lg-5 offset-lg-1 col-12 offset-0 mb-lg-0 mb-4">
                <div class="container-fluid bordered-box p-4">
                    <div class="row">
                        <div class="col-lg-7 col-12">
                            <h1 class="mb-4"><b>{{title}}</b></h1>
                            <h4 class="mb-4"><b>{{text}}</b></h4>
                            <button-link
                                :link="btnLink"
                                :text="btnText"
                                :css="btnCss"
                            ></button-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-12">
                <div class="floating-carousel position-absolute">
                    <ssr-carousel :autoplay-delay="4" :slides-per-page="slides" loop show-arrows>
                        <div class="slide" v-for="category in categories" v-bind:key="category.id" @slideclick="redirect(category.link)">
                            <div class="position-relative d-block cursor-pointer pb-4 mr-3">
                                <h2 class="slide-title w-100 text-center position-absolute text-white px-4"><b>{{category.name}}</b></h2>
                                <img class="w-100 shadow" v-bind:alt="category.alt" v-bind:src="category.src">
                                <div class="layer w-100 position-absolute"></div>
                            </div>
                        </div>
                    </ssr-carousel>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SsrCarousel from 'vue-ssr-carousel';
import ssrCarouselCss from 'vue-ssr-carousel/index.css'
import ButtonLink from "./ButtonLink";

export default {
    name: "CategorySlider",
    components: {ButtonLink, SsrCarousel},
    props: {
        title: String,
        text: String,
        btnLink: String,
        btnText: String,
        btnCss: String,
        categories: Array
    },
    data: function () {
        return {
            slides: 0
        }
    },
    mounted() {
        $(window).on('load resize', this.changeSlideAmount);
    },
    methods: {
        redirect: function (link){
            window.location.href = link;
        },
        changeSlideAmount: function () {
            let width = $(window).width();

            if (width >= 1200) this.slides = 3;
            else if (width >= 992) this.slides = 2;
            else this.slides = 1;
        }
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 10rem;
    }

    .bordered-box{
        border: .5rem solid #2D455D;
    }

    .cursor-pointer{
        cursor: pointer;
    }

    .slide-title{
        top: 50%;
        transform: translate(0, -50%);
        z-index: 1;
    }

    img{
        height: 20rem;
        object-fit: cover;
    }

    .layer{
        left: 0;
        top: 0;
        background-color: #2D455D;
        opacity: 65%;
        height: 20rem;
    }

    .floating-carousel{
        left: -12vw;
        bottom: -5rem;
    }

    @media screen and (max-width: 992px) {
        .root{
            margin-bottom: 2rem;
        }

        .floating-carousel{
            position: initial !important;
        }

        .bordered-box{
            border: none;
        }
    }
</style>
