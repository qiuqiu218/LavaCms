function openWin (name, params = {}) {
  this.$router.push({
    name,
    params
  })
}

export default {
  openWin
}
