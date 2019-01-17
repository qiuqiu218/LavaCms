import axios from '../plugins/axios'

export default {
  index (params) {
    return axios.get('admin', params)
  },
  show (id) {
    return axios.get(`admin/${id}`)
  },
  store (params) {
    return axios.post('admin', params)
  },
  update (id, params) {
    return axios.put(`admin/${id}`, params)
  },
  destroy (id) {
    return axios.delete(`admin/${id}`)
  }
}
