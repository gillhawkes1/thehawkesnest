<template>
  <transition name="fade" mode="out-in">
    <div v-if="showLogin" class="login form-group fade-out">
      <div class="card login-card shadow-lg">
        <form id="loginform" action="">
          <div class="login-input-div">
            <input v-model="returningUser.username" placeholder="username" class="form-control login-input" required/>
          </div>
          <div class="login-input-div">
            <input v-model="returningUser.password" placeholder="password" type="password" class="form-control login-input" required/>
          </div>
          <button id="submitlogin" class="btn submit-btn" @click="this.login(this.returningUser)">Login</button>
        </form>
        <div class="switch-forms">
          <p>New User?</p>
          <a href="javascript:void(0)" @click="this.toggleLogin()">Signup</a>
        </div>
      </div>
    </div>
    <div v-else class="login form-group fade-out">
      <div class="card login-card shadow-lg">
        <form id="signupform" action="">
          <div class="login-input-div">
            <input v-model="newUser.fname" placeholder="first name" type="text" minlength="2" class="form-control login-input" required/>
          </div>
          <div class="login-input-div">
            <input v-model="newUser.lname" placeholder="last name" type="text" minlength="2" class="form-control login-input" required/>
          </div>
          <div class="login-input-div">
            <input v-model="newUser.email" placeholder="email address" type="email" pattern="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/" title="Please enter an email address with the pattern: gill@example.com" class="form-control login-input" required/>
          </div>
          <div class="login-input-div">
            <input v-model="newUser.username" placeholder="username" type="text" minlength="4" class="form-control login-input" required/>
          </div>
          <div class="login-input-div">
            <input v-model="newUser.password" placeholder="password" type="password" minlength="8" class="form-control login-input" required/>
          </div>
          <div class="login-input-div">
            <input v-model="newUser.password2" placeholder="password (again)" type="password" minlength="8" class="form-control login-input" required/>
          </div>
          <button id="submitsignup" class="btn submit-btn" @click="this.signUp(this.newUser)">Signup</button>
        </form>
        <div class="switch-forms">
          <p>Returning User?</p>
          <a href="javascript:void(0)" @click="this.toggleLogin()">Login</a>
        </div>
      </div>
    </div>
  </transition>

</template>

<script>
import auth from '@/auth';
import axios from 'axios';

export default {
  name: "LoginModule",
  props: {},
  data () {
    return {
      showLogin: true,
      showSignup: false,
      returningUser: {
        username: '',
        password: '',
      },
      newUser: {
        username: '',
        password: '',
        password2: '',
        email: '',
        fname:'',
        lname: ''
      },
      promocode: '',
    }
  },
  methods: {
    login() {
      axios.get('/api/public/validateLogin.php').then(response => {
        console.log(response);
        if (response.allowLogin === true) {
          auth.isAuthenticated = true;
          this.$router.push('/home');
        }
      }).catch(error => {
        console.log(error);
      });
    },
    signUp() {
      if(this.newUser.password !== this.newUser.password2) {
        return false;
      } else { 
        axios.get('/api/public/createUser.php').then(response => {
          console.log(response);
          if (response.userCreated === true) {
            alert('Username created. This page will refresh and you may now login.');
            window.location.reload();
          }
        }).catch(error => {
          console.log(error);
        });
      }
    },
    toggleLogin() {
      this.showLogin = !this.showLogin;
      this.showSignup = !this.showSignup;
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
  padding: 20px;
  margin: auto;
  margin-top: 20px;
  margin-bottom: 20px;
  background-color: rgba(207, 206, 203, 0.534);
  box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5) !important;
  border-radius: 20px;
}
.login-input-div {
  text-align: center;
}

.login-input-div > input {
  border-radius: 15px;
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
  margin: 10px 10px 10px 10px;
  border-color: #1f2c3a;
  border:2px solid #1f2c3a;
  background-color: #1f2c3a;
  color: white;
  box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.5) !important;
  border-radius: 15px;
}

.submit-btn:hover {
  border-color: #1f2c3a;
  border:2px solid #1f2c3a;
}
.switch-forms {
  display: inline-flex;
  overflow-y: auto;
  font-size: large;
  margin-bottom: -20px;
}

.switch-forms > p {
  padding-right: 5px
}

/* phones */
@media (max-width: 600px) {
  .login-card {
    width: 80%;

  }
}
</style>
