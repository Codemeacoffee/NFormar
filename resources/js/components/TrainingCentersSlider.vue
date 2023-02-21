<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 offset-md-1 offset-0">
                <div class="container-fluid bordered-box p-4">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-4"><b>{{title}}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-10 offset-lg-0 offset-md-1 pr-0">
                <div class="floating-carousel">
                    <ssr-carousel :autoplay-delay="4" :slides-per-page="slides" loop show-arrows>
                        <div class="slide" v-for="trainingCenter in trainingCenters" v-bind:key="trainingCenter.id" v-on:click="redirect(trainingCenter.link)">
                            <div class="position-relative d-block cursor-pointer mr-3 pb-4">
                                <img class="w-100 shadow" v-bind:alt="trainingCenter.alt" v-bind:src="trainingCenter.src">
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

export default {
    name: "TrainingCentersSlider",
    components: {SsrCarousel},
    props: {
        title: String,
        trainingCenters: Array
    },
    data: function () {
        return {
            slides: 4
        }
    },
    mounted() {
        $(window).on('load resize', this.changeSlideAmount);
    },
    methods:{
        redirect: function (link){
            window.open(link, '_blank').focus();
        },
        changeSlideAmount: function (){
            let width = $(window).width();

            if (width >= 1200) this.slides = 4;
            else if (width >= 992) this.slides = 3;
            else if (width >= 576) this.slides = 2;
            else this.slides = 1;
        }
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .bordered-box{
        border: .5rem solid #2D455D;
        height: 15rem;
    }

    img{
        background-color: white;
        object-fit: cover;
    }

    .cursor-pointer{
        cursor: pointer;
    }

    .floating-carousel{
        margin-left: -30vw;
        margin-top: 6rem;
    }

    @media (max-width: 992px) {
        .root{
            margin-bottom: 2rem;
        }

        .bordered-box{
            border: none;
            height: initial;
        }

        .floating-carousel{
            margin: 0;
        }
    }
</style>
