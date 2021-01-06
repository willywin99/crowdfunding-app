export default {
    namespaced: true,
    state: {
        status      : false,
        commponent  : 'search',     // search, login, atau yang lainnya
    },
    mutations: {
        setStatus: (state, status) => {
            state.status = status
        },
        setComponent: (state, component) => {
            state.commponent = component
        },
    },
    actions: {
        setStatus: ({commit}, status) => {
            commit('setStatus', status)
        },
        setComponent: ({commit}, component) => {
            commit('setComponent', component)
            commit('setStatus', true)
        },
    },
    getters: {
        status      : state => state.status,
        component   : state => state.component
    }
}
