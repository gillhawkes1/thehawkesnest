<template>
  <div class="homepage">
    <h1 v-if="this.userdata">Hello, {{this.$utils.capsFirst(this.userdata.fname)}}!</h1>
    <h5 v-else>Loading...</h5>
  </div>
</template>

<script>
import auth from '@/auth';
import axios from 'axios';
const endpointpath = process.env.VUE_APP_ENDPOINT_PATH;

export default {
  name: 'HomePage',
  props: {
    msg: String
  },
  data () {
    return {
      userdata: null
    }
  },
  methods: {

  },
  beforeCreate() {
    if(auth.isAuthenticated) {
      const username = this.$route.params.username;
      axios.get(`${endpointpath}getUserdata.php?username=${username}`)
        .then(res => {
          this.userdata = res.data;
        })
        .catch(error => {
          console.log(error);
        });
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
