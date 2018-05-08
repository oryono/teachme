<template>
    <div>
        <div><stretch v-if="loading"></stretch></div>
        <div :loading="false" class="row">
            <div class="col-md-3" v-for="category in categories">
                <div class="card card-aside">
                    <div class="card-body d-flex flex-column">
                        <h4><router-link :to="'/courses/' + category.category_id">{{ category.category }}</router-link></h4>
                        <div class="text-muted">{{ category.description }}</div>
                        <div class="d-flex align-items-center pt-5 mt-auto">
                            <div class="avatar avatar-md mr-3"
                                 style="background-image: url(/demo/faces/female/18.jpg)"></div>
                            <div>
                                <a href="./profile.html" class="text-default">Rose Bradley</a>
                                <small class="d-block text-muted">3 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

