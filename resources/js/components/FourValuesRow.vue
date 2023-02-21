<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 text-center">
                            <img class="mb-4" v-bind:src="firstImg" v-bind:alt="firstImgAlt">
                            <h4><b>{{firstTitle}}</b></h4>
                            <p>{{firstText}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 text-center">
                            <img class="mb-4" v-bind:src="secondImg" v-bind:alt="secondImgAlt">
                            <h4><b>{{secondTitle}}</b></h4>
                            <p>{{secondText}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 text-center">
                            <img class="mb-4" v-bind:src="thirdImg" v-bind:alt="thirdImgAlt">
                            <h4><b>{{thirdTitle}}</b></h4>
                            <p>{{thirdText}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 text-center">
                            <img class="mb-4" v-bind:src="fourthImg" v-bind:alt="fourthImgAlt">
                            <h4><b>{{fourthTitle}}</b></h4>
                            <p>{{fourthText}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FourValuesRow",
    props: {
        firstImg: String,
        firstImgAlt: String,
        secondImg: String,
        secondImgAlt: String,
        thirdImg: String,
        thirdImgAlt: String,
        fourthImg: String,
        fourthImgAlt: String,
        firstTitle: String,
        secondTitle: String,
        thirdTitle: String,
        fourthTitle: String,
        firstText: String,
        secondText: String,
        thirdText: String,
        fourthText: String,
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    p{
        margin-bottom: 0;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
