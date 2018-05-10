<template>
    <div>
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    Popular Categories
                </h1>
            </div>
            <top-categories></top-categories>
        </div>

        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    Popular Classes
                </h1>
            </div>
            <popular-courses></popular-courses>
        </div>

    </div>
</template>

<script>
    import TopCategories from './TopCategories'
    import PopularCourses from './PopularCourses'
    export default {
        components: {
            TopCategories,
            PopularCourses
        },
        data(){
            return {

            }

        },

        mounted() {

        },

        methods: {

        }
    }

</script>

<style>

</style>