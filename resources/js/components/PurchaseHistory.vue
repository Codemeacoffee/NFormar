<template>
    <div class="col-lg-8 col-12 root">
        <h1 class="mb-4"><b>Historial de compras</b></h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="text-center"><b>Código</b></th>
                <th scope="col" class="text-center"><b>Fecha</b></th>
                <th scope="col" class="text-center"><b>Precio</b></th>
                <th scope="col" class="text-center"><b>Factura</b></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="tableContent in tableContents">
                <td class="text-center">{{tableContent.id}}</td>
                <td class="text-center">{{tableContent.date}}</td>
                <td class="text-center" v-html="tableContent.price"></td>
                <td class="text-center"><a target="_blank" v-bind:href="tableContent.invoice">Ver factura</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "PurchaseHistory",
    props:{
        tableContents: Array
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    table thead th{
        border-bottom: 2px solid #D50006;
        border-top: none;
    }

    a{
        color: black;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
