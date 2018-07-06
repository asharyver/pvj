<template>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row head-page">
        <div class="col-md-12 col-sm-12">
          <h2 class="Profile">Profil</h2>
          <div class="profil">
            <p class="Patar-Hutabarat"><img src="../../img/profile.png">&nbsp;&nbsp;   {{ $auth.user().name }}</p>
            <div class="phone">
              <p class="Phone-Number">Phone Number</p>
              <p class="layer">{{ $auth.user().telepon }}</p>
            </div>
            <div class="email">
              <p class="E-mail">Email </p>
              <p class="patarhutabaratpvj">{{ $auth.user().email }}</p>
            </div>
            <router-link v-bind:to=" { name: 'user' } " class="btn Button-Filter"><p class="Edit-Profile">Edit Profil <img src="../../img/write.svg" class="Write"></p></router-link>
            <div class="pass">
              <p class="Password">Password</p>
              <btn class="btn Button-pass"><p class="Change-Password">Change Password<img src="../../img/Locked.svg" class="Locked"/></p></btn>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
    export default {
        data: function () {
            return {
                id: null,
                name: null,
                email: null,
                telepon: null,
                errors: [],
                loading: false
            }
        },
        created() {
            this.$auth.ready(function () {
                console.log(this); // Will be proper context.
            });
        }
//            let app = this;
//            this.id = this.$auth.params.id;
//
//            this.$http.get(apiUrl() + '/user/' + this.id)
//                .then(function (res) {
//                    res = res.data;
//                    app.id = res.id;
//                    app.name = res.name;
//                    app.email = res.email;
//                    app.telepon = res.telepon;
//                })
//                .catch(function (res) {
//
//                });
//        },
    }
</script>
