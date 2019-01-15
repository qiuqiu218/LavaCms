<template>
  <div class="w-layout" flex="dir:top box:first">
    <header-module></header-module>
    <div flex="box:first">
      <sider-module></sider-module>
      <div flex="dir:top box:first">
        <breadcrumb-module></breadcrumb-module>
        <div class="content">
          <Card>
            <router-view></router-view>
          </Card>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import HeaderModule from '../components/Header'
import SiderModule from '../components/Sider'
import BreadcrumbModule from '../components/Breadcrumb'
import cache from '@/plugins/cache'

export default {
  components: {
    HeaderModule,
    SiderModule,
    BreadcrumbModule
  },
  beforeRouteEnter (to, from, next) {
    if (!cache.user.get('token')) {
      next(vm => {
        vm.openWin('login')
      })
    } else {
      next()
    }
  },
  methods: {
  }
}
</script>
