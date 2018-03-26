<template>
    <div class="container-fluid">
        <div><h4>Popular Categories</h4></div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><stretch v-if="loading"/></div>
            <div class="col-md-4"></div>
        </div>

        <div :loading="false">
            <div class="row" >
                <div class="col-md-3" v-for="category in categories">
                    <router-link :to="'/courses/' + category.category_id"> {{ category.category }}</router-link>
                </div>
            </div>
        </div>


        <hr>
    </div>
</template>

<script>
    import CategoriesService from "../services/CategoriesService";
    import Stretch from 'vue-loading-spinner/src/components/Stretch'

    export default {
        name: 'top-categories',

        components: {
            Stretch
        },

        data() {
            return {
                categories: [],
                loading: true
            }

        },

        async mounted() {
            var self = this
            return await CategoriesService.getPopularCategories()
                .then(function (response) {
                    self.categories = response.data
                    self.loading = false
                })

        },

    }

</script>

<style>

</style>

