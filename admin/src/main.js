import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import iView from 'iview'
// import minixs from './minixs'
import 'flex.css'
import './less/index.less'

Vue.config.productionTip = false
Vue.use(iView)

// Vue.mixin({
//   methods: {
//     ...minixs
//   }
// })

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
