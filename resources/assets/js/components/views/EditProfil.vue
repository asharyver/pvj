<template>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row head-page">
        <div class="col-md-12 col-sm-12">
          <h2 class="Profile">Profil</h2>
            <form @submit.prevent="save">
                <div class="col-md-6 col-sm-6 edit">
                    <input type="hidden" v-model="$auth.user().id"/>
                    <div class="styled-input agile-styled-input-top">
                        <input type="text" name="name" v-model="$auth.user().name">
                        <label>Full Name</label>
                        <span></span>
                    </div>
                    <div class="styled-input agile-styled-input-top">
                        <input type="text" name="telepon" v-model="$auth.user().telepon">
                        <label>Phone Number</label>
                        <span></span>
                    </div>
                    <div class="styled-input agile-styled-input-top">
                        <input type="text" name="telepon" v-model="$auth.user().email">
                        <label>E-mail</label>
                        <span></span>
                    </div>
                    <button type="submit" class="btn Button-Save"><p class="Edit-Profile">Save <img src="../img/check.svg" class="Write"></p></button>
                </div>
            </form>
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
//        created() {
//            this.$auth.ready(function () {
//                console.log(this); // Will be proper context.
//            });
//        },
        created() {
            let app = this;
            this.id = this.$route.params.id;

            this.$http.get(apiUrl() + '/user/' + this.id)
                .then(function(res) {
                    res = res.data;
                    app.id = res.id;
                    app.name = res.name;
                    app.email = res.email;
                    app.telepon = res.telepon;
                })
                .catch(function(res) {

                });
        },
        methods: {
            save() {
                this.errors = [];
                if (this.name == null) {
                    this.errors.push('The Name field is required !');
                    document.getElementById('name').focus();
                    return false;
                } else if (this.telepon == null) {
                    this.errors.push('The telepon field is required !');
                    document.getElementById('telepon').focus();
                    return false;
                } else if (this.email == null) {
                    this.errors.push('The Email field is required !');
                    document.getElementById('email').focus();
                    return false;
                }
                if (this.loading) {
                    return false;
                }

                let app = this;
                app.loading = true;
                app.errors = null;
                this.$http.put(apiUrl() + '/user/' + this.id, {
                    name: app.name,
                    email: app.email,
                    telepon: app.telepon
                }).then(function(res){
                    app.loading = false;
                    window.localStorage.setItem('success', JSON.stringify([
                        'Profil User : ' + app.name + ' telah diubah'
                    ]));
                    app.$router.push({name: '/'});
                }).catch(function(res) {
                    if (res.response != undefined) {
                        app.errors = res.response.data.errors
                    }
                    app.loading = false;
                });
            }
        }
    }
</script>
