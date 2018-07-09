<template>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row head-page">
        <div class="col-md-12 col-sm-12">
          <h2 class="Profile">Profil</h2>
          <div class="profil">
            <input type="hidden" v-model="id"/>
            <p class="Patar-Hutabarat"><img src="../../img/profile.png">&nbsp;&nbsp;   {{ $auth.user().name }}</p>
            <div class="phone">
              <p class="Phone-Number">Phone Number</p>
              <p class="layer">{{ $auth.user().telepon }}</p>
            </div>
            <div class="email">
              <p class="E-mail">Email </p>
              <p class="patarhutabaratpvj">{{ $auth.user().email }}</p>
            </div>

                <button class="btn Button-Filter" @click="editRow(id)"><p class="Edit-Profile">Edit Profil <img src="../../img/write.svg" class="Write"></p></button>
                <!--<router-link v-bind:to=" { name: 'edit.profil', params.id } " class="btn btn-default Button-Filter"><p class="Edit-Profile">Edit Profil <img src="../../img/write.svg" class="Write"></p></router-link>-->
                <div class="pass">
                  <p class="Password">Password</p>
                  <!--<button class="btn Button-pass" @click="editRow($auth.rowData)"><p class="Edit-Profile">Edit Profil <img src="../../img/write.svg" class="Write"></p></button>-->
                  <router-link v-bind:to=" { name: 'edit.password' } " class="btn Button-pass"><p class="Change-Password">Change Password<img src="../../img/Locked.svg" class="Locked"/></p></router-link>
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
        },
        methods: {
            editRow(rowData) {
                let id = rowData.id;
                this.$router.push({name: 'edit.profil', params: {id}})
            },
        },
        created() {
            let app = this;
            this.id = this.$auth.user().id;

            this.$http.get(apiUrl() + '/user/' + this.id)
                .then(function(res) {
                    res = res.data;
                    app.name = res.name;
                    app.email = res.email;
                    app.telepon = res.telepon;
                    app.level = res.level;
                    app.password = res.password;
                })
                .catch(function(res) {
                });
        },
    }
</script>
