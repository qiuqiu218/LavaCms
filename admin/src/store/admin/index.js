import admin from '@/api/admin'

const state = {
  list: [],
  page: {
    current: 1,
    pageSize: 10,
    total: 0
  },
  loading: {
    index: false, // 查询
    update: false, // 更新
    store: false // 增加
  }
}

const mutations = {
  SET_LIST (state, data) {
    state.list = data.map(res => {
      res.isDestroy = false
      return res
    })
  },
  SET_PAGE_TOTAL (state, total) {
    state.page.total = total
  },
  CHANGE_PAGE (state, page) {
    state.page.current = page
  },
  CHANGE_PAGE_SIZE (state, pageSize) {
    state.page.pageSize = pageSize
    // 每次改变pageSize后，页数初始化为1，数据重新获取
    state.page.current = 1
  }
}

const actions = {
  async index ({ commit, state }) {
    if (state.loading.index) return
    state.loading.index = true
    const res = await admin.index({
      page: state.page.current,
      limit: state.page.pageSize
    })
    commit('SET_LIST', res.data.data)
    commit('SET_PAGE_TOTAL', res.data.total)
    state.loading.index = false
  },
  async store ({ commit, state }, params) {
    if (state.loading.store) return
    state.loading.store = true
    const res = await admin.store(params)
    state.loading.store = false
    return res
  },
  async show ({ state }, id) {
    const res = await admin.show(id)
    return res
  },
  async update ({ commit, state }, params) {
    if (state.loading.update) return
    state.loading.update = true
    const res = await admin.update(params.id, params)
    state.loading.update = false
    return res
  },
  async destroy ({ commit, state, dispatch }, index) {
    let v = state.list[index]
    v.isDestroy = true
    const res = await admin.destroy(v.id)
    dispatch('index')
    return res
  },
  changePage ({ dispatch, commit }, page) {
    commit('CHANGE_PAGE', page)
    dispatch('index')
  },
  changePageSize ({ dispatch, commit }, pageSize) {
    commit('CHANGE_PAGE_SIZE', pageSize)
    dispatch('index')
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
