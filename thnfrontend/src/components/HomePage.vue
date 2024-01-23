<template>
  <div class="homepage">
    <!-- <h1>Hello, {{this.userdata.fname}}!</h1> -->
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
      userdata: null,
      username: null,
    }
  },
  methods: {
    beforeMount() {
      // if(auth.isAuthenticated) {
        
      // }
      // axios.get(`${endpointpath}getUserdata.php?username=${this.username}`);
    }
  },
  beforeRouteEnter(to, from, next) {
    if(auth.isAuthenticated) {
      const username = to.params.username;
      let fetchedUserData;
      const fetch = axios.get(`${endpointpath}getUserdata.php?username=${username}`);
        fetch.then(res => {
          console.log(res);
          fetchedUserData = res.data;
        })
        .catch(error => {
          console.log(error);
          next(false);
        }).finally(() => {
          next(vm => {
            vm.userdata = fetchedUserData;
          });
        });
    }
  },
  mounted() {
    console.log(this.userdata);
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
