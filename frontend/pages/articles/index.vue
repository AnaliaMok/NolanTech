<template>
  <div>
    <h2>Articles</h2>
    <ul>
      <li v-for="article in articles" :key="article.id">
        <strong>{{ article.attributes.title }}</strong>
      </li>
    </ul>
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
          articles: res.data.data
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
