import auth from '@/api/auth'
import { user } from '@/plugins/cache'

const state = {
  token: ''
}

const mutations = {
  LOGIN (state) {
    //
  },
  SET_TOKEN (state, token) {
    state.token = token
    user.set('token', token)
  }
}

const actions = {
  async getToken ({ commit }, payload) {
    const token = await auth.getToken(payload)
    commit('SET_TOKEN', token)
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
