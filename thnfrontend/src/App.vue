<template>
  <img alt="The Hawkes Nest logo" src="./../public/images/hawkesbaby.png" class="homepageimg">
  <LinksModule />
  <LoginModule />
</template>

<script>
import LoginModule from './components/LoginModule.vue'
import LinksModule from './components/LinksModule.vue'

export default {
  name: 'App',
  components: {
    LoginModule,
    LinksModule
  }
}
</script>

<style>
html, body {
  background-color: #2c3e50;
}
#theHawkesNest {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  height: 100vh;
  background-color: #2c3e50;
}
.shadow {
  box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5) !important;
}
.homepageimg {
  height: 300px;
  width: 300px;
}
h3 {
  margin: 40px 0 0;
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
  color: #d86b04;
}
.fade-out {
  overflow: hidden;
}
.fade-enter-active, .fade-leave-active {
  transition: all 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

@media (max-width: 600px){
  .homepageimg {
    height: 200px;
    width: 200px;
  }
}
</style>
