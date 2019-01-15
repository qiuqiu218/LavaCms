<template>
  <Menu width="200px" :open-names="openNames" @on-select="switchSider" @on-open-change="changeSider" :active-name="siderActiveName">
    <Submenu :name="v.name" v-for="v in list" :key="v.name">
      <template slot="title">
        <Icon type="ios-navigate"></Icon>
        <span>{{v.title}}</span>
      </template>
      <MenuItem :name="item.name" v-for="item in v.children" :key="item.name">{{item.title}}</MenuItem>
    </Submenu>
  </Menu>
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters('menu', {
      list: 'getSider'
    }),
    ...mapState('menu', {
      openNames: state => state.openNames,
      siderActiveName: state => state.siderActiveName
    })
  },
  watch: {
    siderActiveName (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.openFrame(this.siderActiveName)
      }
    }
  },
  methods: {
    ...mapActions('menu', [
      'changeSider',
      'switchSider'
    ])
  }
}
</script>
