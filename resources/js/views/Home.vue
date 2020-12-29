<template>
  <div>
      <!-- template campaigns -->
      <v-container class="ma-0 pa-0" grid-list-sm>
          <div class="text-right">
              <v-btn small text to="/campaigns" class="blue--text">
                All Campaigns <v-icon>mdi-chevron-right</v-icon>
              </v-btn>
          </div>
          <v-layout wrap>
              <v-flex v-for="(campaign, index) in campaigns" :key="`campaign-`+campaign.id" xs6>
                <v-card :to="'/campaign'+campaign.id">
                  <v-img
                      :src="campaign.image"
                      class="black--text"
                  >
					<v-card-title
						class="fill-height align-end"
						v-text="campaign.title"
					></v-card-title>
                  </v-img>
                </v-card>
              </v-flex>
          </v-layout>
      </v-container>
      <!-- template campaigns -->

      <!-- template Blogs -->
      <v-container class="ma-0 pa-0" grid-list-sm>
          <div class="text-right">
              <v-btn small text to="/blogs" class="blue--text">
                All Blogs <v-icon>mdi-chevron-right</v-icon>
              </v-btn>
          </div>
          <v-layout wrap>
              <v-carousel hide-delimiters height="250px">
                  <v-carousel-item v-for="(blog, i) in blogs" :key="`blog-`+blog.id">
                      <v-img :src="blog.image" class="fill-height">
                          <v-container fill-height fluid pa-0 ma-0>
                              <v-layout fill-height align-end>
                                  <v-flex xs12 mx-2>
                                      <span class="headline black--text" v-text="blog.title"></span>
                                  </v-flex>
                              </v-layout>
                          </v-container>
                      </v-img>
                  </v-carousel-item>
              </v-carousel>
          </v-layout>
      </v-container>
      <!-- template Blogs -->

  </div>
</template>

<script>
export default {
    data: () => ({
        campaigns: [],
        blogs: [],
    }),
    created() {
        axios.get('api/campaign/random/2')
            .then((response) => {
                // console.log(response.data)
                let { data } = response.data
                this.campaigns = data.campaigns
                console.log(this.campaigns)
            })
            .catch((error) => {
                let { response } = error
                console.log(responses)
            })

        axios.get('api/blog/random/2')
            .then((response) => {

                let { data } = response.data
                this.blogs = data.blogs

            })
            .catch((error) => {
                let { response } = error
                console.log(responses)
            })
    }
}
</script>

<style>

</style>
