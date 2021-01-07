export default {
    namespaced: true,
    state: {
        user: {},
    },
    mutations: {
        set: (state, payload) => {
            state.user = payload
        },
    },
    actions: {
        set: ({commit}, payload) => {
            commit('set', payload)
        },
        checkToken: ({commit}, payload) => {
            let config = {
                headers: {
                    'Authorization': 'Bearer ' + payload.token,
                },
            }

            axios.post('/api/auth/check-token', {}, config)
            .then((response) => {
                commit('set', payload)
            })
            .catch((error) => {
                commit('set', {})
            })
        },
    },
    getters: {
        user    : state => state.user,
        guest   : state => Object.keys(state.user).length === 0,
    }
}
