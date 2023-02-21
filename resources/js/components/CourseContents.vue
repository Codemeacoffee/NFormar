<template>
    <div class="col-lg-5 offset-lg-1 col-12 offset-0">
        <div v-html="description"></div>
        <div v-if="contents[0]">
            <h5 class="mb-4"><b>Contenido</b></h5>
            <div v-for="content in contents" class="borderedBox px-4 mb-4">
                <p>{{content}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CourseContents",
    props: {
        description: String,
        contents: Array
    }
}
</script>

<style scoped>
    ul li{
        list-style-type: none;
    }

    .borderedBox{
        border-left: 8px solid #2D455D;
        border-bottom: 1px solid #2D455D;
    }

    .borderedBox p{
        margin-bottom: 0;
    }
</style>
