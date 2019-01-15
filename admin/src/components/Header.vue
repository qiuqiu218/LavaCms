<template>
  <div flex="box:justify cross:stretch" class="header">
    <div class="logo">logo</div>
    <Menu mode="horizontal" @on-select="selectRoot" :active-name="activeName">
      <MenuItem :name="v.name" v-for="v in list" :key="v.name">
        {{v.title}}
      </MenuItem>
    </Menu>
    <div class="admin">
      <Dropdown @on-click="clickDropdown">
        <div flex="cross:center">
          <Avatar icon="ios-person"/>
          <Font :size="8" style="margin-left: 6px">{{userInfo.nickname}}</Font>
          <Icon type="md-arrow-dropdown" style="font-size: 24px" />
        </div>
        <DropdownMenu slot="list">
          <DropdownItem name="setup">设置</DropdownItem>
          <DropdownItem name="logout">注销</DropdownItem>
        </DropdownMenu>
      </Dropdown>
    </div>
  </div>
</template>

<script>
// import cache from '@/plugins/cache'
import { mapGetters, mapState } from 'vuex'
export default {
  computed: {
    ...mapGetters('menu', {
      list: 'getHeaderMenu'
    }),
    ...mapState('menu', {
      activeName: state => state.activeName
    })
  },
  methods: {
    clickDropdown (name) {
      this[name]()
    },
    logout () {
      this.$Modal.confirm({
        content: '您真的要注销吗?',
        onOk: async () => {
          const message = await this.$store.dispatch('auth/logout')
          this.openWin('login')
          this.$Message.success(message)
        }
      })
    },
    selectRoot (name) {
      this.$store.dispatch('menu/switchHeaderMenu', name)
    }
  }
}
</script>
