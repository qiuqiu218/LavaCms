import cache from '@/plugins/cache'

const state = {
  list: [],
  activeName: '',
  openNames: [],
  siderActiveName: ''
}

const getters = {
  getHeaderMenu (state) {
    if (state.list.length === 0) {
      state.list = cache.menu.get('list') || []
      state.activeName = cache.menu.get('activeName') || state.list[0].name
      state.siderActiveName = cache.menu.get('siderActiveName') || ''
      state.openNames = cache.menu.get('openNames') || []
    }
    return state.list
  },
  getSider (state, getters) {
    let list = getters.getHeaderMenu
    let item = list.find(res => res.name === state.activeName)
    if (item) {
      return item.children
    } else {
      return []
    }
  }
}

const mutations = {
  SET_MENU (state, data) {
    state.list = data
    cache.menu.set('list', state.list)
  },
  SET_ACTIVE_NAME (state, name) {
    state.activeName = name
    cache.menu.set('activeName', state.activeName)
  },
  SET_OPEN_NAMES (state, names) {
    state.openNames = names
    cache.menu.set('openNames', state.openNames)
  },
  SET_SIDER_ACTIVE_NAME (state, name) {
    state.siderActiveName = name
    cache.menu.set('siderActiveName', state.siderActiveName)
  }
}

const actions = {
  setMenu ({ commit }, data) {
    commit('SET_MENU', data)
    commit('SET_ACTIVE_NAME', data[0].name)
  },
  switchHeaderMenu ({ commit }, name) {
    commit('SET_ACTIVE_NAME', name)
    commit('SET_OPEN_NAMES', [])
  },
  changeSider ({ commit }, names) {
    commit('SET_OPEN_NAMES', names)
  },
  switchSider ({ commit }, name) {
    commit('SET_SIDER_ACTIVE_NAME', name)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
