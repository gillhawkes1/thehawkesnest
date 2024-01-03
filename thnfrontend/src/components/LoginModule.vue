<template>
  <div v-if="showLogin" class="login form-group">
    <div class="card login-card shadow-lg">
      <form id="loginform" action="">
        <div class="login-username">
          <input v-model="user.username" placeholder="username" class="form-control login-input" required/>
        </div>
        <div class="login-password login-input-div">
          <input v-model="user.password" placeholder="password" type="password" class="form-control login-input" required/>
        </div>
        <button id="submitlogin" class="btn submit-btn" @click="this.login()">Login</button>
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
  width: 20%;
  align-items: center;
  padding: 15px;
  margin: auto;
  margin-top: 20px;
  margin-bottom: 20px;
  background-color: rgba(207, 206, 203, 0.534);
  box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5) !important;
}
.login-input-div {
  text-align: center;
}

.login-input {
  background-color: white;
  margin: 5px;
  box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5) !important;
}

::placeholder {
  font-style: italic;
  color: rgb(133, 133, 133);
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.submit-btn {
  margin-top: 10px;
  border-color: #1f2c3a;
  border:2px solid #1f2c3a;
  background-color: #1f2c3a;
  color: white;
  box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5) !important;
}

.submit-btn:hover {
  border-color: #1f2c3a;
  border:2px solid #1f2c3a;
}

/* phones */
@media (max-width: 600px) {
  .login-card {
    width: 80%;

  }
}
</style>
