<template>
    <div class="col-lg-10 offset-1 col-12 offset-0 root">
        <h1 class="mb-4"><b>Usuarios</b></h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="text-center"><b>ID</b></th>
                <th scope="col" class="text-center"><b>Nombre</b></th>
                <th scope="col" class="text-center"><b>Apellidos</b></th>
                <th scope="col" class="text-center"><b>Email</b></th>
                <th scope="col" class="text-center"><b>Dirección</b></th>
                <th scope="col" class="text-center"><b>Pais</b></th>
                <th scope="col" class="text-center"><b>Fecha de Registro</b></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="tableContent in tableContents">
                <td class="text-center">{{tableContent.id}}</td>
                <td class="text-center">{{tableContent.name}}</td>
                <td class="text-center">{{tableContent.surnames}}</td>
                <td class="text-center">{{tableContent.email}}</td>
                <td class="text-center">{{tableContent.address}}</td>
                <td class="text-center">{{tableContent.country}}</td>
                <td class="text-center">{{tableContent.date}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "AdminUsers",
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
