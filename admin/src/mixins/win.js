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

function closeWin (step = -1) {
  this.$router.go(step)
}

export default {
  openWin,
  openFrame,
  closeWin
}
