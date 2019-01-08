<template>
  <div class="w-layout" flex="dir:top box:first">
    <header-module></header-module>
    <div flex="box:first">
      <sider-module></sider-module>
      <div flex="dir:top box:first">
        <breadcrumb-module></breadcrumb-module>
        <div class="content">
          <Card>
              <p>Content of no border type. Content of no border type. Content of no border type. Content of no border type. </p>
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

export default {
  components: {
    HeaderModule,
    SiderModule,
    BreadcrumbModule
  },
  methods: {
  }
}
</script>
