<template>
  <div background-color="grey darken-3">
      <v-container class="ma-0 pa-0" grid-list-sm>
          <v-subheader>
              All Campaigns
          </v-subheader>
          <v-layout wrap>
              <v-flex v-for="(campaign) in campaigns" :key="`campaign-`+campaign.id" xs6>
                  <!-- <v-card :to="'/campaign/'+campaign.id">
                    <v-img :src="campaign.image" class="black--text">
                        <v-card-title class="fill-height align-end" v-text="campaign.title"></v-card-title>
                    </v-img>
                  </v-card> -->
                  <campaign-item :campaign="campaign"></campaign-item>
              </v-flex>
          </v-layout>
          <v-pagination
            v-model="page"
            @input="go"
            :length="lengthPage"
            :total-visible="6"
          ></v-pagination>
      </v-container>
  </div>
</template>

<script>
import CampaignItemVue from '../components/CampaignItem.vue'
export default {
    components: {
        'campaign-item': CampaignItemVue
    },
    data: () => ({
        campaigns: [],
        page: 0,
        lengthPage: 0
    }),
    created() {
        this.go()
    },
    methods: {
        go() {
            let url = 'api/campaign?page=' + this.page
            axios.get(url)
            .then((response) => {
                let { data } = response.data
                // console.log(data)
                this.campaigns = data.campaigns.data
                this.page = data.campaigns.current_page
                this.lengthPage = data.campaigns.last_page
                // consoloe.log(this.lengthPage)
            })
            .catch((error) => {
                let { response } = error
                console.log(response)
            })
        },
        handleClick() {
            this.$vuex.commit("increment")
        }
    }
}
</script>

<style>

</style>
