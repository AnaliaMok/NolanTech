<template>
  <section class="hero">
    <div class="container">
      <h2>{{ title }}</h2>
      <p v-if="body.length > 0">{{ body }}</p>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: ''
    },
    body: {
      type: String,
      default: ''
    },
    isCentered: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style lang="scss">
.hero {
  padding: 4rem 0.5rem;
  background-color: $darker-slate;
  background-image: url("data:image/svg+xml,%3Csvg width='84' height='48' viewBox='0 0 84 48' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h12v6H0V0zm28 8h12v6H28V8zm14-8h12v6H42V0zm14 0h12v6H56V0zm0 8h12v6H56V8zM42 8h12v6H42V8zm0 16h12v6H42v-6zm14-8h12v6H56v-6zm14 0h12v6H70v-6zm0-16h12v6H70V0zM28 32h12v6H28v-6zM14 16h12v6H14v-6zM0 24h12v6H0v-6zm0 8h12v6H0v-6zm14 0h12v6H14v-6zm14 8h12v6H28v-6zm-14 0h12v6H14v-6zm28 0h12v6H42v-6zm14-8h12v6H56v-6zm0-8h12v6H56v-6zm14 8h12v6H70v-6zm0 8h12v6H70v-6zM14 24h12v6H14v-6zm14-8h12v6H28v-6zM14 8h12v6H14V8zM0 8h12v6H0V8z' fill='%23465768' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
  color: $lightest-slate;
  text-align: center;

  @media screen and (min-width: $screen-md) {
    text-align: left;
  }

  @media screen and (min-width: $screen-lg) {
    height: 50vh;
    padding: 2rem 0;
  }

  .container {
    display: flex;
    height: 100%;
    flex-flow: column nowrap;
    justify-content: center;

    h2 {
      font-size: $text-xl;
      @media screen and (min-width: $screen-md) {
        max-width: 75%;
      }
      @media screen and (min-width: $screen-lg) {
        max-width: 60%;
        font-size: $text-2xl;
      }
    }

    p {
      font-size: $text-base;
      margin-top: 1rem;
      @media screen and (min-width: $screen-lg) {
        font-size: $text-md;
      }
    }
  }
}
</style>
