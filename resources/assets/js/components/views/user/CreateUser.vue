<template>
    <main class="main">
    <headful v-bind:title="'Create new - ' + appName" description="User" />
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger" v-for="(error) in errors">
                                {{ error }}
                            </div>
                            <form v-bind:action="currentUrl" method="POST" v-on:submit.prevent="create">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Input Username" v-model="username" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" v-model="email" />
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" v-model="pass" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" v-bind:disabled="loading == true">Simpan</button>
                                    <div id="fountainG" v-if="loading">
                                        <div id="fountainG_1" class="fountainG"></div>
                                        <div id="fountainG_2" class="fountainG"></div>
                                        <div id="fountainG_3" class="fountainG"></div>
                                        <div id="fountainG_4" class="fountainG"></div>
                                        <div id="fountainG_5" class="fountainG"></div>
                                        <div id="fountainG_6" class="fountainG"></div>
                                        <div id="fountainG_7" class="fountainG"></div>
                                        <div id="fountainG_8" class="fountainG"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</template>
<script>
    export default {
        data: function() {
            return {
                username: null,
                email: null,
                pass: null,
                errors: [],
                loading: false
            }
        },

        methods: {
            create() {
                if (this.loading) {
                    return false;
                }

                let app = this;
                app.loading = true;
                app.errors = null;
                this.$http.post(apiUrl() + '/user', {
                    username: app.username,
                    email: app.email,
                    password: app.pass
                }).then(function(res){
                    app.loading = false;
                    window.localStorage.setItem('success', JSON.stringify([
                                                                          'User baru telah ditambahkan'
                                                                          ]));
                    app.$router.push({name: 'user'});
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
