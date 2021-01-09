<template>
  <div class="container">
      <v-container class="ma-0 pa-0" grid-list-sm>
          <v-subheader>
              All Blogs
          </v-subheader>
          <v-layout wrap>
              <v-flex v-for="(blog) in blogs" :key="`blog-`+blog.id" xs6>
                  <v-card :to="'/blog/'+ blog.id">
                    <v-img :src="blog.image" class="white--text">
                        <v-card-title class="fill-height align-end" v-text="blog.title"></v-card-title>
                    </v-img>
                  </v-card>
              </v-flex>
          </v-layout>
          <v-pagination
            v-model="page"
            @input="go"
            :length="lengthPage"
            :total-visible="6"
          >
          </v-pagination>
      </v-container>
  </div>
</template>

<script>
export default {
    data: () => ({
        blogs: [],
        page: 0,
        lengthPage: 0
    }),
    created(){
        this.go()
    },
    methods: {
        go(){
            let url = 'api/blog?page=' + this.page
            axios.get(url)
                .then((response) => {
                    let { data } = response.data
                    console.log(data);
                    this.blogs = data.blogs.data
                    this.page = data.blogs.current_page
                    this.lengthPage = data.blogs.last_page
                })
                .catch((error) => {
                    let { responses } = error
                    console.log(responses)
                })
        }
    },
    // mounted() {
    //     console.log('Component mounted.')
    // }
}
</script>

<style>

</style>
