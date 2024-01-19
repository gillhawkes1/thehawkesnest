<template>
  <div class="homepage">
    <h1>Hello, {{this.userdata.fname}}!</h1>
  </div>
</template>

<script>
//import axios from 'axios';

export default {
  name: 'HomePage',
  props: {
    msg: String
  },
  data () {
    return {
      userdata: {
        fname: ""
      },
    }
  },
  methods: {
    beforeRender() {
    }
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
h1 {
  color: black;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
