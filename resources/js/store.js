import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
      transaction: 0,
    },
    mutations: {
      insert : (state, payload) => {
        state.transaction++
      }
    },
    actions: {

    },
    getters: {
        transaction: state => state.transaction
    }
  })

export default store

