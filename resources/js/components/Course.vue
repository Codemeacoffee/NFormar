<template>
    <div v-bind:class="[css, 'mb-4 pb-2']">
        <div>
            <span class="newTag position-absolute text-white px-2 py-1" v-if="newUntil && newUntil > currentTime"><b>¡Nuevo!</b></span>
            <a v-bind:href="link"><img class="w-100" v-bind:src="image" v-bind:alt="imageAlt"></a>
        </div>
        <div class="bg-white shadow-lg p-4">
            <div class="titleContainer mb-2">
                <h5 class="title"><a v-bind:href="link"><b>{{name}}</b></a></h5>
            </div>
            <div class="descriptionContainer mb-2" v-html="description"></div>
            <div class="d-flex mb-2">
                <small class="originalPrice mt-2 mr-2" v-if="parseFloat(originalPrice.replaceAll('.', '').replace(',', '.')) > parseFloat(currentPrice.replaceAll('.', '').replace(',', '.'))" v-html="originalPrice"></small>
                <h4 class="currentPrice"><b v-html="currentPrice"></b></h4>
            </div>
            <button-link
                css="red px-5"
                text="Ver más"
                :link="link"
            ></button-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Course",
    props:{
        css: String,
        newUntil: String,
        currentTime: Number,
        image: String,
        imageAlt: String,
        name: String,
        description: String,
        originalPrice: String,
        currentPrice: String,
        link: String,
    }
}
</script>

<style scoped>
    .newTag{
        background-color: #D50006;
        left: 2rem;
        top: 1rem;
    }

    .currentPrice{
        color: #D50006;
    }

    a{
        color: #212529;
        text-decoration: none;
    }

    .titleContainer{
        overflow: hidden;
        height: 4rem;
    }

    .descriptionContainer{
        overflow: hidden;
        height: 4.5rem;
    }

    .title, .descriptionContainer >>> p{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    img{
        height: 12rem;
        object-fit: cover;
    }

    .originalPrice{
        text-decoration: line-through;
        color: #2D455D;
    }
</style>
