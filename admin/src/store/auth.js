import auth from '@/api/auth'
import cache from '@/plugins/cache'

const actions = {
  async login ({ dispatch, commit }, payload) {
    await dispatch('getToken', payload)
    // 获取管理员信息，并缓存起来
    const res = await auth.login()
    cache.user.setAll(res.data.userInfo)
    // 缓存菜单
    await dispatch('menu/setMenu', res.data.menu, { root: true })
    return res
  },
  async getToken (context, payload) {
    const token = await auth.getToken(payload)
    cache.user.set('token', token)
  },
  async logout () {
    cache.user.clearAll()
    return '注销成功'
  }
}

export default {
  namespaced: true,
  actions
}
