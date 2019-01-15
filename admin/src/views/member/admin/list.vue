<template>
  <div>
    <Table :loading="loading" border :columns="columns" :data="list"></Table>
  </div>
</template>

<script>
import { mapState } from 'vuex'

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
          width: 125,
          fixed: 'right',
          render: (h, params) => {
            return h('div', [
              h('Button', {
                props: {
                  type: 'primary',
                  size: 'small'
                },
                style: {
                  marginRight: '5px'
                }
              }, '编辑'),
              h('Button', {
                props: {
                  type: 'error',
                  size: 'small'
                }
              }, '删除')
            ])
          }
        }
      ]
    }
  },
  computed: {
    ...mapState('admin/list', {
      list: state => state.list,
      loading: state => state.loading
    })
  },
  created () {
    this.$store.dispatch('admin/list/index')
  }
}
</script>
