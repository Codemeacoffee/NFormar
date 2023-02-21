<template>
    <div class="modal fade" v-bind:id="id" tabindex="-1" role="dialog" v-bind:aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center w-100" v-bind:id="title"><b>{{title}}</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" v-html="content"></div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn" data-dismiss="modal"><b>Aceptar</b></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    props: {
        id: String,
        title: String,
        content: String,
    },
    mounted() {
        $('#'+this.id).modal('show');
    }
}
</script>

<style scoped>
    .btn{
        border-radius: 0;
        background-color: #D50006;
        color: white;
    }

    .modal-header{
        border-bottom: none;
    }

    .modal-footer{
        display: block;
        border-top: none;
    }
</style>
