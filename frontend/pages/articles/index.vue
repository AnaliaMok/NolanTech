<template>
  <div>
    <h2>Articles</h2>
    <pre>{{ title }}</pre>
  </div>
</template>

<script>
export default {
  components: {},
  async asyncData({ app }) {
    const data = await app.$axios
      .get('/api/node/article', {})
      .then(res => {
        return {
          // title: res.data.data.attributes.title,
          // body: res.data.data.attributes.body.value
          title: res
        }
      })
      .catch(err => {
        if (err) {
          return err
        }
      })

    return data
  }
}
</script>

<style></style>
