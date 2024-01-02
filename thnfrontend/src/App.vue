<template>
  <img alt="The Hawkes Nest logo" src="./../public/images/thn-favicon.png">
  <LoginModule />
  <UnderConstruction msg="Powered by Vuejs, PHP & MySQL. This site is underway!"/>
</template>

<script>
import UnderConstruction from './components/UnderConstruction.vue'
import LoginModule from './components/LoginModule.vue'

export default {
  name: 'App',
  components: {
    UnderConstruction,
    LoginModule
  }
}
</script>

<style>
#theHawkesNest {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
h3 {
  margin: 40px 0 0;
  color: red;
}
h2 {
  padding: 10px;
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
