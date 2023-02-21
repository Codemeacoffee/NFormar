<template>
    <div class="container-fluid root">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-12 offset-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a v-bind:class="[location.active , 'nav-item nav-link']" v-bind:id="location.tab" v-bind:href="'#'+location.id" v-bind:aria-controls="location.id" v-bind:aria-selected="location.selected" data-toggle="tab" role="tab" v-for="location in locations"><h4><b>{{location.name}}</b></h4></a>
                                </div>
                            </nav>
                            <div class="tab-content p-xl-5 p-0 pt-4" id="nav-tabContent">
                                <div v-bind:class="[location.active ,'tab-pane fade show']" v-bind:id="location.id" v-bind:aria-labelledby="location.tab" v-for="location in locations" role="tabpanel">
                                    <div class="mb-5" v-for="quarter in location.quarters">
                                        <p><b>{{quarter.index}}</b></p>
                                        <p>{{quarter.phone}}</p>
                                        <a target="_blank" v-bind:href="quarter.map"><p>{{quarter.location}}</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12">
                            <div class="bg-white shadow-lg px-xl-5 p-4 pb-xl-5 pb-4">
                                <img class="w-100" v-bind:src="image" v-bind:alt="imageAlt">
                                <p>{{text}}</p>
                                <a target="_blank" v-bind:href="link">{{website}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContactBlock",
    props: {
        image: String,
        imageAlt: String,
        text: String,
        link: String,
        website: String,
        locations: Array
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .nav-tabs{
        border: none;
    }

    .container-fluid .nav-link{
        background-color: transparent;
        border: none;
        color: #000;
    }

    .container-fluid .active h4{
        color: #D50006;
        border-bottom: 4px solid #D50006;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }

        .nav-tabs{
            justify-content: space-between;
        }

        .nav-item h4{
           font-size: 1rem;
        }

        .nav-link{
            padding: 0;
        }
    }
</style>
