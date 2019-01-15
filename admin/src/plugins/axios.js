import axios from 'axios'
import cache from './cache'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['Accept'] = 'application/json'

function ajax (data) {
  axios.defaults.baseURL = 'http://lavacms/admin/'
  if (cache.user.get('token')) {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + cache.user.get('token')
  }

  return new Promise((resolve, reject) => {
    axios(data)
      .then(res => res.data)
      .then(res => {
        if (res.status === 'success') {
          resolve(res)
        } else {
          reject(res)
        }
      })
      .catch(res => {
        if (res.response) {
          if (res.response.status === 401) {
            reject(res.response.data)
          } else {
            reject(res.response.data)
          }
        } else {
          reject(new Error('网络错误'))
        }
      })
  })
}

export default {
  get (url, data) {
    return ajax({
      url,
      method: 'get',
      params: data
    })
  },
  post (url, data) {
    return ajax({
      url,
      method: 'post',
      data
    })
  },
  put (url, data) {
    return ajax({
      url,
      method: 'put',
      data
    })
  },
  delete (url, data) {
    return ajax({
      url,
      method: 'delete',
      data
    })
  }
}
