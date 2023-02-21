<template>
    <div class="col-xl-7 col-lg-8 col-12 root">
        <h1 class="mb-4"><b>{{title}}</b></h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-12 mb-4 pb-2" v-for="course in courses">
                    <div>
                        <img class="w-100" v-bind:src="course.image" v-bind:alt="course.imageAlt">
                    </div>
                    <div class="bg-white shadow-lg p-4">
                        <div class="titleContainer">
                            <h5 class="title"><b>{{course.name}}</b></h5>
                        </div>
                        <div class="descriptionContainer mb-3" v-html="course.description"></div>
                        <button-link
                            css="red px-5"
                            text="Empezar"
                            :link="course.link"
                        ></button-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonLink from "./ButtonLink";

export default {
    name: "CoursesStartShowcase",
    components: {ButtonLink},
    props: {
        title: String,
        courses: Array,
    },
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .titleContainer{
        overflow: hidden;
        max-height: 4rem;
    }

    .descriptionContainer{
        overflow: hidden;
        max-height: 4.2rem;
    }

    .title, .descriptionContainer >>> p{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 0;
        }
    }
</style>
