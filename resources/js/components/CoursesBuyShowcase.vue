<template>
    <div class="col-xl-7 col-lg-8 col-12 root">
        <h1 class="mb-4"><b>{{title}}</b></h1>
        <div class="container-fluid">
            <div class="row">
                <Course v-for="course in courses" v-bind:key="course.link"
                        css="col-xl-4 col-lg-6 col-12"
                        :new-until="course.newUntil"
                        :current-time="currentTime"
                        :image="course.image"
                        :image-alt="course.imageAlt"
                        :name="course.name"
                        :description="course.description"
                        :original-price="course.originalPrice"
                        :current-price="course.currentPrice"
                        :link="course.link"
                ></Course>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonLink from "./ButtonLink";
import Course from "./Course";

export default {
    name: "CoursesBuyShowcase",
    components: {Course, ButtonLink},
    props: {
        title: String,
        courses: Array,
        currentTime: Number
    },
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 0;
        }
    }
</style>
