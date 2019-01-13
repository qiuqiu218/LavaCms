import auth from '@/api/auth'
import cache from '@/plugins/cache'

const state = {
  token: '',
  id: 0,
  username: ''
}

const mutations = {
  LOGIN (state) {
    state = Object.assign(state, cache.user.getAll())
  }
}

const actions = {
  async getToken ({ commit }, payload) {
    const token = await auth.getToken(payload)
    cache.user.set('token', token)
    const res = await auth.login()
    cache.user.setAll(res.data)
    commit('LOGIN')
    return res
  },
  async logout () {
    cache.user.clearAll()
    return '注销成功'
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
