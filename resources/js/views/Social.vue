<template>
  <div>
      <!-- <h1> Halaman Social.vue </h1> -->
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
    export default {
        data() {
            return {
                code: '',
                provider: ''
            }
        },
        computed: {
            ...mapGetters({
                user: 'auth/user',
            }),
        },
        methods: {
            ...mapActions({
                setAlert: 'alert/set',
                setAuth: 'auth/set',
                setDialogStatus: 'dialog/setStatus'
            }),
            go(provider, code) {
                let url = '/api/auth/social/' + provider + '/callback?code=' + code
                axios.get(url)
                    .then((response) => {
                        let { data } = response.data
                        console.log(data)
                        this.setAuth(data)
                        if(this.user.user.id.length>0) {
                            this.setAlert({
                                status: true,
                                color: 'success',
                                text: 'Login success',
                            })
                            this.setDialogStatus(false)
                            this.$router.push({ name: 'home' })
                        } else {
                            this.setAlert({
                                status: true,
                                color: 'error',
                                text: 'Login failed',
                            })
                        }
                    })
                    .catch((error) => {
                        this.setAlert({
                            status: true,
                            text: 'Login Failed',
                            color: 'error',
                        })
                    })
            }
        },
        mounted() {
            this.code = this.$route.query.code
            this.provider = this.$route.path.split('/')[3]

            // console.log(this.code)
            // console.log(this.provider)

            this.go(this.provider, this.code)
        },
    }
</script>

<style>

</style>
