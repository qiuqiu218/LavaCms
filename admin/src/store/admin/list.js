import admin from '@/api/admin'

const state = {
  list: [],
  loading: false
}

const mutations = {
  SET_LIST (state, data) {
    state.list = data
  }
}

const actions = {
  async index ({ commit, state }, params) {
    if (state.loading) return
    state.loading = true
    const res = await admin.index(params)
    commit('SET_LIST', res.data)
    state.loading = false
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
