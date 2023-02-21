<template>
    <div class="col-lg-10 offset-1 col-12 offset-0 root">
        <h1 class="mb-4"><b>Pedidos</b></h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="text-center"><b>Código</b></th>
                <th scope="col" class="text-center"><b>Nombre</b></th>
                <th scope="col" class="text-center"><b>Apellidos</b></th>
                <th scope="col" class="text-center"><b>Email</b></th>
                <th scope="col" class="text-center"><b>Fecha</b></th>
                <th scope="col" class="text-center"><b>Precio</b></th>
                <th scope="col" class="text-center"><b>Factura</b></th>
                <th scope="col" class="text-center"><b>Reembolso</b></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="tableContent in tableContents">
                <td class="text-center">{{tableContent.id}}</td>
                <td class="text-center">{{tableContent.name}}</td>
                <td class="text-center">{{tableContent.surnames}}</td>
                <td class="text-center">{{tableContent.email}}</td>
                <td class="text-center">{{tableContent.date}}</td>
                <td class="text-center" v-html="tableContent.price"></td>
                <td class="text-center"><a target="_blank" v-bind:href="tableContent.invoice">Ver factura</a></td>
                <td v-if="tableContent.refunded < 1" class="text-center">
                    <button-modal
                        :data-target="'#refundModal'+tableContent.id"
                        text="Ofrecer Reembolso"
                        css="red"
                    ></button-modal>
                </td>
                <td v-else class="text-center">Pedido reembolsado</td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" v-for="tableContent in tableContents" v-bind:id="'refundModal'+tableContent.id" tabindex="-1" role="dialog" v-bind:aria-labelledby="'refundModalTitle-'+tableContent.id" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center w-100" v-bind:id="'refundModalTitle'+tableContent.id"><b>Ofrecer reembolso</b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Está seguro de que desea ofrecer un reembolso por el pedido número <b>{{tableContent.id}}</b>?</p>
                    </div>
                    <div class="modal-footer text-center">
                        <button-link
                            text="Aceptar"
                            :link="tableContent.refund"
                            css="red"
                        ></button-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonModal from "./ButtonModal";
import ButtonLink from "./ButtonLink";
export default {
    name: "AdminOrders",
    components: {ButtonLink, ButtonModal},
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
