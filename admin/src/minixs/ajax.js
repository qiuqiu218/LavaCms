import axios from 'axios'

function ajax (data) {
  axios.defaults.baseURL = 'http://192.168.0.238/api/'

  return new Promise((resolve, reject) => {
    axios(data)
      .then(res => res.data)
      .then(res => {
        if (res.status === 'success') {
          resolve(res)
        } else {
          if (res.code === 401) {

          } else {
            reject(res)
          }
        }
      })
      .catch(res => {
        reject(res)
      })
      .then(res => {
      })
  })
}

function get (url, data) {
  return ajax.call(this, {
    url,
    method: 'get',
    params: data
  })
}

function post (url, data) {
  return ajax.call(this, {
    url,
    method: 'post',
    data
  })
}

export default {
  get,
  post
}
