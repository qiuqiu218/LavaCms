<template>
  <div>
    <div>
      <Button type="primary" @click="openWin('member/admin/create')">新增管理员</Button>
    </div>
    <br />
    <Table :loading="loading.index" border :columns="columns" :data="list">
      <template slot="action" slot-scope="{row, index}">
        <div flex="main:justify">
          <Button type="primary" size="small" @click="openWin('member/admin/update', {id: row.id})">编辑</Button>
          <Poptip
            confirm
            transfer
            title="您真的要删除吗?"
            @on-ok="delInfo(index)">
            <Button type="warning" size="small" :loading="row.isDestroy">删除</Button>
          </Poptip>
        </div>
      </template>
    </Table>
    <br />
    <div style="text-align: right">
      <Page :total="page.total" :current="page.current" :page-size="page.pageSize" @on-change="changePage" @on-page-size-change="changePageSize" show-sizer />
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  data () {
    return {
      columns: [
        {
          title: 'ID',
          key: 'id',
          width: 80
        },
        {
          title: '用户名',
          key: 'username'
        },
        {
          title: '昵称',
          key: 'nickname',
          width: 100
        },
        {
          title: '注册时间',
          key: 'created_at',
          width: 150
        },
        {
          title: '操作',
          width: 140,
          fixed: 'right',
          slot: 'action'
        }
      ]
    }
  },
  computed: {
    ...mapState('admin', {
      list: state => state.list,
      loading: state => state.loading,
      page: state => state.page
    })
  },
  methods: {
    ...mapActions('admin', [
      'changePage',
      'changePageSize'
    ]),
    delInfo (index) {
      this.$store.dispatch('admin/destroy', index)
        .then(res => {
          this.$Message.success(res.message)
        })
        .catch(res => {
          this.$Message.error(res.message)
        })
    }
  },
  created () {
    this.$store.dispatch('admin/index')
  }
}
</script>
