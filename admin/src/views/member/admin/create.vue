<template>
  <div style="width: 300px">
    <div>
      <Button type="dashed" @click="closeWin()" icon="ios-arrow-back">返回</Button>
    </div>
    <br />
    <Form :model="data" :label-width="60" :rules="rule" ref="form">
      <FormItem label="用户名" prop="username">
        <Input v-model="data.username" placeholder="请输入用户名"></Input>
      </FormItem>
      <FormItem label="密码" prop="password">
        <Input type="password" v-model="data.password" placeholder="请输入密码"></Input>
      </FormItem>
      <FormItem label="昵称" prop="nickname">
        <Input v-model="data.nickname" placeholder="请输入昵称"></Input>
      </FormItem>
      <FormItem label="邮箱" prop="email">
        <Input v-model="data.email" placeholder="请输入邮箱"></Input>
      </FormItem>
      <FormItem label="手机号" prop="phone">
        <Input v-model="data.phone" placeholder="请输入手机号"></Input>
      </FormItem>
      <FormItem>
          <Button type="primary" @click="submit" :loading="loading.store">提交</Button>
          <Button @click="reset" style="margin-left: 8px">重置</Button>
      </FormItem>
    </Form>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  data () {
    return {
      data: {
        username: 'admin1',
        password: '111111',
        nickname: '',
        email: '',
        phone: ''
      },
      rule: {
        username: [
          {
            required: true,
            message: '用户名必填',
            trigger: 'blur'
          },
          {
            type: 'string',
            max: 20,
            message: '用户名最大20个字符',
            trigger: 'blur'
          }
        ],
        password: [
          {
            required: true,
            message: '密码必填',
            trigger: 'blur'
          },
          {
            type: 'string',
            min: 6,
            max: 20,
            message: '密码必须为6~20个字符之间',
            trigger: 'blur'
          }
        ],
        nickname: [
          {
            type: 'string',
            max: 20,
            message: '昵称最多20个字符',
            trigger: 'blur'
          }
        ],
        email: [
          {
            type: 'email',
            message: '错误的邮箱格式',
            trigger: 'blur'
          }
        ],
        phone: [
          {
            pattern: /^1\d{10}$/,
            message: '请输入11位手机号',
            trigger: 'blur'
          }
        ]
      }
    }
  },
  computed: {
    ...mapState('admin', {
      loading: state => state.loading
    })
  },
  methods: {
    submit () {
      this.$store.dispatch('admin/store', this.data)
        .then(res => {
          this.closeWin()
          this.$Message.success(res.message)
        })
        .catch(res => {
          this.$Message.error(res.message)
        })
    },
    reset () {
      this.$refs.form.resetFields()
    }
  }
}
</script>
