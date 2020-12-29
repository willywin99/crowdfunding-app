<template>
  <div class="warpper">
      <h2>SanberCode</h2>
      <router-link to="/">Home</router-link>
      <router-link to="/donations">Donations</router-link>
      <router-link to="/blogs">Blogs</router-link>
      <div class="content-wrapper">
          <router-view></router-view>
      </div>
      <app-footer/>
  </div>
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
