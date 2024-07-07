<template>
  <div class="login">
    <LinksModule />
    <!-- <LoginModule /> -->
  </div>
</template>

<script>
// import LoginModule from './LoginModule.vue';
import LinksModule from './LinksModule.vue';
export default {
  name: 'LoginPage',
  props: {
    msg: String
  },
  components: {
    // LoginModule,
    LinksModule,
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
