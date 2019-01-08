<template>
  <div flex="main:center cross:center" style="height: 100%">
    <Card style="width: 250px">
      <p slot="title">管理员登录</p>
      <Form label-position="right" :label-width="50">
        <FormItem label="用户名">
          <Input placeholder="请输入用户名"></Input>
        </FormItem>
        <FormItem label="密码">
          <Input placeholder="请输入密码"></Input>
        </FormItem>
      </Form>
    </Card>
  </div>
</template>

<script>
export default {
  data () {
    return {}
  }
}
</script>
