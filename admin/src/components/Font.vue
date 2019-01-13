<template>
  <span :class="[fontSize]">
    <slot></slot>
  </span>
</template>

<script>
export default {
  props: {
    size: {
      type: Number,
      default: 10
    }
  },
  computed: {
    fontSize () {
      return 'w-font-' + this.size
    }
  }
}
</script>
