<template>
  <div flex="box:justify cross:stretch" class="header">
    <div class="logo">logo</div>
    <Menu mode="horizontal" active-name="1">
      <MenuItem name="1">
        <Icon type="ios-navigate"></Icon>Item 1
      </MenuItem>
      <MenuItem name="2">
        <Icon type="ios-keypad"></Icon>Item 2
      </MenuItem>
      <MenuItem name="3">
        <Icon type="ios-analytics"></Icon>Item 3
      </MenuItem>
      <MenuItem name="4">
        <Icon type="ios-paper"></Icon>Item 4
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
export default {
  methods: {
    clickDropdown (name) {
      this[name]()
    },
    logout () {
      this.$Modal.confirm({
        content: '您真的要注销吗?',
        onOk: async () => {
          const message = await this.$store.dispatch('user/auth/logout')
          this.openWin('login')
          this.$Message.success(message)
        }
      })
    }
  }
}
</script>
