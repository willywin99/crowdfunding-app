<template>
  <!-- App.vue -->

    <v-app>
        <v-navigation-drawer app>
            Side Bar
        </v-navigation-drawer>

        <v-app-bar app>
            Header
        </v-app-bar>

        <!-- Sizes your content based upon application components -->
        <v-main>

            <!-- Provides the application the proper gutter -->
            <v-container fluid>

            <!-- If using vue-router -->
            <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app>
            @SanberCode 2020
        </v-footer>
    </v-app>
</template>

<script>
export default {
    created() {
        console.log('Component mounted.')
    }
}
</script>

<style>

</style>
