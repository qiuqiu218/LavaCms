import store from 'store2'

export default {
  user: store.namespace('user'),
  common: store.namespace('common'),
  menu: store.namespace('menu')
}
