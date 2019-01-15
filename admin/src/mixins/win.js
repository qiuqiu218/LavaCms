import MENU from '@/config/MENU'

function openWin (name, params = {}) {
  this.$router.push({
    name,
    params
  })
}

function openFrame (name) {
  this.openWin(MENU[name])
}

export default {
  openWin,
  openFrame
}
