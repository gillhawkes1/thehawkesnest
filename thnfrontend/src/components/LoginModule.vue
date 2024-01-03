<template>
  <div v-if="showLogin" class="login form-group">
    <div class="card login-card">
      <h3>Login</h3>
      <form id="loginform" action="">
        <div class="login-username">
          <input v-model="user.username" placeholder="username" class="form-control login-input" required/>
        </div>
        <div class="login-password login-input-div">
          <input v-model="user.password" placeholder="password" type="password" class="form-control login-input" required/>
        </div>
        <button id="submitlogin" class="btn btn-primary submit-btn" @click="this.login()">Login</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "LoginModule",
  props: {},
  data () {
    return {
      showLogin: true,
      user: {
        username: '',
        password: '',
      },
      promocode: '',
    }
  },
  methods: {
    login() {
      axios.get('/api/public/getLinks.php').then(response => {
        console.log(response);
      }).catch(error => {
        console.log(error);
      })

    },
    submitPromo() {

    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.login {
  display: inline;
  align-items: center;
  text-align: center;
  width: 60%;
  padding-bottom: 20px;
}
.login-card {
  width: 30%;
  min-width: 70%;
  align-items: center;
  padding: 10px;
  margin: auto;
  margin-top: 20px;
  margin-bottom: 20px;
  background-color: rgba(207, 206, 203, 0.534);
}
.login-input-div {
  text-align: center;
}

.login-input {
  background-color: white;
  margin: 5px;
}

::placeholder {
  font-style: italic;
  color: rgb(133, 133, 133);
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.submit-btn {
  margin-top: 10px;
}
</style>
