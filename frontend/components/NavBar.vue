<template functional>
  <nav class="nav">
    <div class="nav__container">
      <nuxt-link to="/" class="nav__brand"
        ><img src="~/assets/images/LightLogo.svg" alt="Nolan Tech"
      /></nuxt-link>
      <nuxt-link to="/">Home</nuxt-link>
      <nuxt-link to="/services">Services</nuxt-link>
      <nuxt-link to="/work">Work</nuxt-link>
      <nuxt-link to="/blog">Blog</nuxt-link>
    </div>
  </nav>
</template>

<script>
export default {}
</script>

<style lang="scss">
.nav {
  background-color: $darker-slate;
  padding: 2rem 0;

  &__container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin: 0 auto;
    width: 80%;

    a {
      color: $lightest-slate;
      display: block;
      font-weight: 600;
      font-size: 1.8rem;
      text-decoration: none;

      &:not(:first-child) {
        padding: 1.5rem;
      }
    }
  }

  &__brand {
    max-width: 6rem;
    margin-right: auto;
  }
}
</style>
