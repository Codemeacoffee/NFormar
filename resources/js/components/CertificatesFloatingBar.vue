<template>
    <div class="floatingBar shadow d-lg-inline-block d-none">
        <div>
            <img class="d-block" v-for="certificate in certificates" v-bind:src="certificate.src" v-bind:alt="certificate.alt">
        </div>
    </div>
</template>

<script>
export default {
    name: "CertificatesFloatingBar",
    props:{
        certificates: Array
    }
}
</script>

<style scoped>
    .floatingBar{
        position: fixed;
        right: 0;
        top: 50%;
        transform: translate(0, -50%);
        background-color: white;
        z-index: 999;
    }

    img{
        width: 5rem;
    }
</style>
