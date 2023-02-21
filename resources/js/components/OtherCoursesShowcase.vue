<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-lg-10 col-12 offset-lg-1 offset-0">
                <h5 class="mb-4"><b>{{title}}</b></h5>
                <div class="container-fluid">
                    <div class="row">
                        <Course v-for="course in courses" :key="course.id"
                                css="col-lg-3 col-md-4 col-12"
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
                    <div class="row">
                        <div class="col-12 text-center">
                            <button-link
                                css="red"
                                text="Ver más cursos"
                                :link="moreCoursesLink"
                            ></button-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Course from "./Course";
import ButtonLink from "./ButtonLink";
export default {
    name: "OtherCoursesShowcase",
    components: {ButtonLink, Course},
    props: {
        title: String,
        moreCoursesLink: String,
        courses: Array,
        currentTime: Number
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
