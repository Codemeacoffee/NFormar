<template>
    <div class="container-fluid">
        <div class="row bg-color">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
                            <div class="container-fluid">
                                <div class="row pt-5">
                                    <div class="col-md-4 col-12 offset-lg-1 offset-0 mb-4">
                                        <p class="text-white"><b>{{firstTopColTitle}}</b></p>
                                        <p class="pb-0" v-for="content in firstColContents">
                                            <a class="text-white" v-bind:href="content.link">{{content.text}}</a>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-12 mb-4">
                                        <p class="text-white"><b>{{secondTopColTitle}}</b></p>
                                        <p class="pb-0" v-for="content in secondColContents">
                                            <a class="text-white" v-bind:href="content.link">{{content.text}}</a>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <p class="text-white"><b>{{thirdTopColTitle}}</b></p>
                                        <div class="d-flex">
                                            <a target="_blank" class="socials mr-4" v-bind:href="facebookUrl"><img v-bind:alt="facebookImageAlt" v-bind:src="facebookImage"></a>
                                            <a target="_blank" class="socials mr-4" v-bind:href="linkedinUrl"><img v-bind:alt="linkedinImageAlt" v-bind:src="linkedinImage"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row flex-column-reverse flex-lg-row pt-lg-4 pt-5">
                                    <div class="col-xl-5 col-lg-6 col-12 offset-xl-1 offset-0">
                                        <p class="text-white mb-lg-0 mb-4 mt-4">{{firstBottomColTitle}}</p>
                                    </div>
                                    <div class="col-xl-5 col-lg-6 col-12">
                                        <div class="d-lg-flex d-block justify-content-between paymentMethods">
                                            <img v-bind:alt="content.imageAlt" v-bind:src="content.image" v-for="content in secondBottomColContents">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FooterComponent",
    props: {
        firstTopColTitle: String,
        secondTopColTitle: String,
        thirdTopColTitle: String,
        firstBottomColTitle: String,
        secondBottomColContents: Array,
        firstColContents: Array,
        secondColContents: Array,
        facebookUrl: String,
        linkedinUrl: String,
        facebookImage: String,
        linkedinImage: String,
        facebookImageAlt: String,
        linkedinImageAlt: String,
    }
}
</script>

<style scoped>
    .bg-color{
        background-color: #2D455D;
    }

    .socials{
        width: 2rem;
    }

    .paymentMethods img{
      width: 15%;
    }

    @media screen and (max-width: 768px) {
        .paymentMethods img{
            width: 33%;
        }
    }
</style>
