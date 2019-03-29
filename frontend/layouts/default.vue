<template>
  <div>
    <NavBar />
    <nuxt />
  </div>
</template>

<script>
import NavBar from '~/components/Navbar'

export default {
  components: {
    NavBar
  }
}
</script>

<style lang="scss">
#__layout {
  & > div {
    padding-top: 90.8px;
  }
}
</style>
