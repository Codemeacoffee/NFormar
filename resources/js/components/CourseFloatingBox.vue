<template>
    <div class="col-lg-4 offset-lg-1 col-12 offset-0 floatingBoxContainer">
        <div class="floatingBox position-sticky bg-white shadow-lg p-lg-5 p-0 mb-lg-0 mb-5">
            <h3><b>{{title}}</b></h3>
            <h5 class="mb-5 pb-lg-5 pb-0">{{category}}</h5>
            <div class="d-flex mb-2">
                <h4 class="originalPrice mt-2 mr-4" v-if="parseFloat(originalPrice.replaceAll('.', '').replace(',', '.')) > parseFloat(currentPrice.replaceAll('.', '').replace(',', '.'))" v-html="originalPrice"></h4>
                <h1 class="currentPrice"><b v-html="currentPrice"></b></h1>
            </div>
            <button-link
                v-if="alreadyPurchased"
                :link="platformCourseUrl"
                css="red w-100 mb-2"
                text="Empezar"
            ></button-link>
            <button-link
                v-else
                :link="addToCartUrl"
                css="red w-100 mb-2"
                text="Añadir al carrito"
            ></button-link>
            <p class="text-center" v-if="!alreadyPurchased">
                <a v-if="isInWishList" v-bind:href="removeFromWishListUrl"><small class="wishList">Quitar de la lista de deseos</small></a>
                <a v-else v-bind:href="addToWishListUrl"><small class="wishList">Añadir a la lista de deseos</small></a>
            </p>
        </div>
    </div>
</template>

<script>
import ButtonModal from "./ButtonModal";
import ButtonLink from "./ButtonLink";
export default {
    name: "CourseFloatingBox",
    components: {ButtonLink, ButtonModal},
    props:{
        title: String,
        category: String,
        originalPrice: String,
        currentPrice: String,
        addToWishListUrl: String,
        addToCartUrl: String,
        platformCourseUrl: String,
        removeFromWishListUrl: String,
        isInWishList: Boolean,
        alreadyPurchased: Boolean,
    }
}
</script>

<style scoped>
    .floatingBoxContainer{
        margin-top: -22rem;
    }

    .floatingBox{
        top: 12rem;
    }

    .currentPrice{
        color: #D50006;
    }

    .originalPrice{
        text-decoration: line-through;
        color: #2D455D;
    }

    .wishList{
        cursor: pointer;
        text-decoration: underline;
        color: #0E2130;
    }

    @media screen and (max-width: 992px) {
        .floatingBoxContainer{
            margin-top: 0;
        }
        .floatingBox{
            position: static !important;
            background-color: transparent !important;
            box-shadow: none !important;
        }
    }
</style>
