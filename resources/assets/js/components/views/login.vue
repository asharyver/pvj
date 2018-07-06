
<template>
  <div id="login">
    <div class="body-login">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="judul">
              <h3><img class="logo" src="../img/logo.png">Merchant Portal</h3>
            </div>
            <div class="login-panel panel panel-default">
              <div class="head-login">
                <h3>Log In</h3>
              </div>
              <div class="panel-input contact-form">
                <form @submit.prevent="login">
                  <div class="alert alert-danger" v-if="errors" v-for="error in errors">
                    <p>{{ error }}</p>
                  </div>
                  <fieldset>
                    <div class="form">
                      <span class="lg">
                          <img src="../img/envelope.png">
                      </span>
                      <div class="styled-input agile-styled-input-top">
                        <input type="text" name="telepon" v-model="telepon">
                        <label>No Handphone</label>
                        <span></span>
                      </div>
                      <span class="lg1">
                          <img src="../img/lock.png">
                      </span>
                      <div class="styled-input agile-styled-input-top">
                        <input v-model="password" type="password" name="password">
                        <label>Password</label>
                        <span></span>
                      </div>
                    </div>
                    <div class="styled-input agile-styled-input-top">
                      <div class="lupa">
                        <router-link to="/register" >  Lupa Password ? </router-link>
                      </div>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" class="btn btn-lg btn-login">Log in</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
      name: 'login',
      data() {
          return {
              telepon: null,
              password: null,
              errors: []
          }
      },

      methods: {
          login() {
              // Reset error
              this.errors = [];
              if (this.telepon == null) {
                  this.errors.push('No Handphone pengguna dibutuhkan !');
                  document.getElementById('email').focus();
                  return false;
              } else if (this.password == null) {
                  this.errors.push('Password dibutuhkan !');
                  document.getElementById('password').focus();
                  return false;
              }

              var app = this

              this.$auth.login({
                  params: {
                      telepon: app.telepon,
                      password: app.password
                  },
                  success: function (res) {
                      // console.log(res);
                  },
                  error: function (resp) {
                      app.errors.push(resp.response.data.msg);
                      app.telepon = null;
                      app.password = null;
                  },
                  fetchUser: true
              });
          }
      }
  }
</script>


