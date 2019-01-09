<template>
  <div flex="main:center cross:center" style="height: 100%">
    <Card style="width: 250px">
      <p slot="title">管理员登录</p>
      <Form label-position="right" :label-width="50">
        <FormItem label="用户名">
          <Input placeholder="请输入用户名" v-model="form.username"></Input>
        </FormItem>
        <FormItem label="密码">
          <Input placeholder="请输入密码" v-model="form.password"></Input>
        </FormItem>
        <FormItem>
          <Button type="primary" @click="submit">登录</Button>
        </FormItem>
      </Form>
    </Card>
  </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        username: '',
        password: ''
      }
    }
  },
  methods: {
    submit () {
      this.$store.dispatch('user/auth/getToken', this.form)
        .catch(res => {
          this.$Message.error(res.message)
        })
    }
  }
}
</script>
