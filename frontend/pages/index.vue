<template>
  <section>
    <Hero :title="heroTitle" :body="heroBody" />
    <nuxt-link to="/articles">Articles</nuxt-link>
    <section class="container">
      <div style="padding:4rem 0;">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
          ducimus incidunt sapiente distinctio? Odit iure, explicabo asperiores
          reprehenderit laboriosam pariatur tenetur incidunt fugit deleniti
          placeat, repudiandae quisquam. Autem, vero. Minus, nisi. Numquam
          consectetur harum architecto voluptate! Voluptates, rem? Voluptate
          consequuntur enim laudantium pariatur numquam, officia corrupti vitae
          eius? Placeat asperiores, nihil officiis, tempore pariatur, quae
          dolorum explicabo impedit adipisci quaerat harum perspiciatis tempora
          magni ipsum corrupti. Assumenda incidunt illum natus voluptate laborum
          excepturi, dolores odit impedit tenetur necessitatibus veritatis quam
          explicabo accusantium eius ducimus reprehenderit! Illum quasi commodi
          voluptas accusamus doloremque, similique eum placeat assumenda hic
          quibusdam, at deleniti rerum!
        </p>
      </div>
    </section>
  </section>
</template>

<script>
import Hero from '~/components/Hero'

export default {
  components: {
    Hero
  },
  data() {
    return {
      heroTitle: 'Marketing & Technology Solutions Partner',
      heroBody: 'We develop business strategies to help you succeed.'
    }
  },
  head() {
    return {
      title: 'Nolan Tech',
      titleTemplate: '%s'
    }
  }
}
</script>

<style lang="scss"></style>
