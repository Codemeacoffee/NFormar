<template>
    <div class="container-fluid root">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-xl-7 col-lg-6 col-12 pl-lg-0 pl-3 mb-lg-0 mb-4">
                <div class="floating-carousel position-absolute shadow-lg">
                        <ssr-carousel :autoplay-delay="4" :slides-per-page="1" show-arrows loop>
                        <div class="slide h-100" v-for="course in courses" v-bind:key="course.id">
                            <div class="container-fluid content position-relative h-100 p-0">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-2 mt-lg-5 col-10 offset-1 mt-0 py-5">
                                        <h2 class="text-white titleContainer my-4"><b>{{course.name}}</b></h2>
                                        <div class="text-white descriptionContainer mb-4" v-html="course.description"></div>
                                        <button-link
                                            :text="btnText"
                                            :link="course.link"
                                            :css="btnCss"
                                        ></button-link>
                                    </div>
                                </div>
                                <img class="position-absolute w-100 h-100" v-bind:alt="course.alt" v-bind:src="course.src">
                                <div class="position-absolute w-100 h-100 layer"></div>
                            </div>
                        </div>
                    </ssr-carousel>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-12">
                <div class="container-fluid bordered-box p-4">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-4 col-12 offset-0">
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
import SsrCarousel from 'vue-ssr-carousel';
import ssrCarouselCss from 'vue-ssr-carousel/index.css'
import ButtonLink from "./ButtonLink";

export default {
    name: "RemarkedCoursesSlider",
    components: {ButtonLink, SsrCarousel},
    props: {
        title: String,
        text: String,
        btnText: String,
        btnCss: String,
        courses: Array
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 16rem;
    }

    div >>>.VueCarousel, div >>> .VueCarousel-wrapper, div >>> .VueCarousel-inner {
        height: 100% !important;
    }

    img{
        object-fit: cover;
        top: 0;
        z-index: -2;
    }

    .titleContainer {
        height: 70px;
    }

    .descriptionContainer{
        height: 80px;
    }

    .titleContainer, .descriptionContainer >>> p{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .layer{
        left: 0;
        top: 0;
        background-color: #141C2A;
        opacity: 65%;
        z-index: -1;
    }

    .bordered-box{
        border: .5rem solid #D50915;
    }

    .floating-carousel{
        left: 0;
        right: -10vw;
        bottom: -9rem;
        top: 3rem;
        z-index: 1;
    }

    @media screen and (max-width: 992px) {
        .root{
            margin-bottom: 0;
        }

        .floating-carousel {
            position: initial !important;
        }

        .bordered-box {
            border: none;
        }
    }
</style>
