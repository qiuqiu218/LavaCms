import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth'
import menu from './menu'
import admin from './admin'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    menu,
    auth,
    admin
  }
})
