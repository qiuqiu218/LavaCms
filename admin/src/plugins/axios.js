import axios from 'axios'

// // 添加请求拦截器
// axios.interceptors.request.use(function (config) {
//   // 在发送请求之前做些什么
//   return config
// }, error => {
//   return Promise.reject(error)
// })

// // 添加响应拦截器
// axios.interceptors.response.use(function (response) {
//   // 对响应数据做点什么
//   return response
// }, error => {
//   return Promise.reject(error)
// })

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

function ajax (data) {
  axios.defaults.baseURL = 'http://192.168.0.238/admin/'

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
        if (res.response.status === 401) {
          reject(res.response.data)
        } else {
          reject(res.response.data)
        }
      })
  })
}

function get (url, data) {
  return ajax({
    url,
    method: 'get',
    params: data
  })
}

function post (url, data) {
  return ajax({
    url,
    method: 'post',
    data
  })
}

export default {
  get,
  post
}
