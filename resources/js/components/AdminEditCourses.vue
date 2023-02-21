<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4 pb-2 h-100" v-for="course in courses">
                <div class="position-relative">
                    <div>
                        <img class="w-100" v-bind:src="course.image" v-bind:alt="course.imageAlt">
                    </div>
                    <div class="bg-white shadow-lg p-4">
                        <div class="titleContainer mb-3">
                            <h5 class="title mb-4"><b>{{course.name}}</b></h5>
                        </div>
                        <div class="text-center">
                            <button-modal
                                css="red position-relative px-5"
                                text="Editar"
                                :modal="'#editCourse-'+course.id"
                            ></button-modal>
                        </div>
                    </div>
                    <div v-if="!course.price" class="layer w-100 h-100 position-absolute"></div>
                </div>
            </div>
        </div>

        <div class="modal fade" v-bind:id="'editCourse-'+course.id" tabindex="-1" role="dialog" v-bind:aria-labelledby="'modalLabel-'+course.id" aria-hidden="true" v-for="course in courses">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title w-100 text-center" v-bind:id="'modalLabel-'+course.id"><b>Editar Curso</b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" v-bind:action="course.action" enctype="multipart/form-data">
                        <div class="modal-body">
                            <img v-bind:id="'image-'+course.id" v-on:click="uploadImage(course.id)" class="w-100 innerImage mb-4" v-bind:src="course.image" v-bind:alt="course.imageAlt">
                            <input v-bind:id="'imageInput-'+course.id" v-bind:data-target="'image-'+course.id" class="d-none imageInput" type="file" name="image" accept="image/*">
                            <div class="form-group">
                                <label v-bind:for="'oldPrice-'+course.id">Precio anterior</label>
                                <input type="number" step="0.01" class="form-control" v-bind:id="'oldPrice-'+course.id" name="oldPrice" v-bind:aria-labelledby="'priceHelp-'+course.id" v-bind:value="parseFloat(course.oldPrice.replaceAll('.', '').replace(',', '.'))">
                                <small v-bind:id="'priceHelp-'+course.id" class="form-text text-muted">Este campo solo es necesario si el curso ha sido rebajado de precio.</small>
                            </div>
                            <div class="form-group">
                                <label v-bind:for="'price-'+course.id">Precio actual</label>
                                <input type="number" step="0.01" class="form-control" v-bind:id="'price-'+course.id" name="price" v-bind:value="parseFloat(course.price.replaceAll('.', '').replace(',', '.'))">
                            </div>
                            <div class="form-check">
                                <input v-if="course.newUntil > currentTime" type="checkbox" class="form-check-input" v-bind:id="'newCourse-'+course.id" name="newUntil" checked>
                                <input v-else type="checkbox" class="form-check-input" v-bind:id="'newCourse-'+course.id" name="newUntil">
                                <label class="form-check-label" v-bind:for="'newCourse-'+course.id">Marcar como nuevo.</label>
                            </div>
                        </div>
                        <div class="modal-footer text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cerrar</b></button>
                            <button type="submit" class="btn red"><b>Guardar</b></button>
                        </div>
                        <input type="hidden" name="_token" v-bind:value="csrf">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonModal from "./ButtonModal";
import Modal from "./Modal";
export default {
    name: "AdminEditCourses",
    components: {Modal, ButtonModal},
    props:{
        csrf: String,
        categories: Array,
        courses: Array,
        currentTime: Number
    },
    mounted() {
        $('.imageInput').change(function (){
            let input = this;
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+$(input).attr('data-target')).attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    },
    methods: {
        uploadImage: function (id) {
            $('#imageInput-' + id).trigger('click');
        },
    }
}
</script>

<style scoped>
    .btn{
        border-radius: 0;
        color: white;
        z-index: 1;
    }

    .titleContainer{
        overflow: hidden;
        height: 2.7rem;
    }

    .title{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .red{
        background-color: #D50006;
    }

    img{
        object-fit: cover;
        height: 15rem;
    }

    .innerImage{
        cursor: pointer;
    }

    .layer{
        left: 0;
        top: 0;
        z-index: 0;
        background-color: #0E2130;
        opacity: .65;
        pointer-events: none;
    }

    .modal-header{
        border-bottom: none;
    }

    .modal-footer{
        display: block;
        border-top: none;
    }
</style>
