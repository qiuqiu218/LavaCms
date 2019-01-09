import axios from '../plugins/axios'

export default {
  getToken (payload) {
    return axios.post('getToken', payload).then(res => {
      return res.data.access_token
    })
  }
}
