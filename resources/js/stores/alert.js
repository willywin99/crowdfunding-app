import colors from "vuetify/lib/util/colors";

export default{
    namespaced: true,
    state: {
        status  : false,
        color   : 'success',    // warning, error, info
        text    : ''
    },
    mutations: {
        set: (state, payload) => {
            state.status = payload.status
            state.text = payload.text
            state.color = payload.color
        },
    },
    actions: {
        set: ({commit}, payload) => {
            commit('set', payload)
        },
    },
    getters: {
        status  : state => state.status,
        color  : state => state.color,
        text  : state => state.text,
    }
}
