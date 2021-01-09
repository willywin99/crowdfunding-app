<template>
    <div>
        <v-card v-if="blog.id">
            <v-img
                class="white--text"
                :src="blog.image"
                height="200px"
            >
                    <v-card-title
                        class="fill-height align-end"
                        v-text="blog.title"
                    >
                    </v-card-title>
            </v-img>

            <v-card-text>
                <!-- <v-simple-table dense>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </v-simple-table> -->

                Description: <br>
                {{ blog.description }}
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    data: () => ({
        blog: {}    // objek blog
    }),
    created() {
        this.go()
    },
    methods: {
        go() {
            let { id } = this.$route.params
            let url = '/api/blog/'+id
            axios.get(url)
                .then((response) => {
                    let { data } = response.data
                    this.blog = data.blog
                })
                .catch((error) => {
                    let { responses } = error
                    console.log(responses)
                })
        }
    }
}
</script>

<style>

</style>
