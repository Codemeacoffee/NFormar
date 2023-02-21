<template>
    <div class="banner position-relative mb-5">
        <img class="w-100 h-100" v-bind:alt="imageAlt" v-bind:src="image">
        <div class="w-100 h-100 position-absolute layer"></div>
    </div>
</template>

<script>
export default {
    name: "CourseBanner",
    props:{
        image: String,
        imageAlt: String
    }
}
</script>

<style scoped>
    img{
        object-fit: cover;
    }

    .banner{
        height: 25rem;
    }

    .layer{
        left: 0;
        top: 0;
        background-color: #141C2A;
        opacity: .65;
    }

    @media screen and (max-width: 992px) {
        .banner{
            height: 15rem;
        }
    }
</style>
