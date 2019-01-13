import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import mixins from './mixins'
import cache from './plugins/cache'
import iView from 'iview'
import Font from './components/Font.vue'
import 'flex.css'
import './less/index.less'

Vue.component('Font', Font)
Vue.config.productionTip = false
Vue.use(iView)

Vue.mixin({
  data () {
    return {
      userInfo: cache.user.getAll() || {}
    }
  },
  methods: {
    ...mixins
  }
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
