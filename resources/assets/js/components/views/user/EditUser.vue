<template>
    <main class="main">
        <headful v-bind:title="'Edit User - ' + appName" description="User" />
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-danger" v-for="(error) in errors">
                                    {{ error }}
                                </div>
                                <form v-bind:action="currentUrl" method="POST" v-on:submit.prevent="save">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" v-model="username" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" v-model="email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" v-model="password" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" v-bind:disabled="loading == true">Update</button>
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
                id: null,
                username: null,
                email: null,
                password: null,
                errors: [],
                loading: false
            }
        },
        created() {
            let app = this;
            this.id = this.$route.params.id;
            
//            this.$http.get(apiUrl() + '/jurusan')
//                .then(function(res) {
//                    app.jurusan = res.data;
//            });
            
            this.$http.get(apiUrl() + '/user/' + this.id)
                .then(function(res) {
                    res = res.data;
                    app.id = res.id;
                    app.username = res.username;
                    app.email = res.email;
                    app.password = res.password;
                })
                .catch(function(res) {
                    
                });
        },
        methods: {
            save() {
                if (this.loading) {
                    return false;
                }
                
                let app = this;
                app.loading = true;
                app.errors = null;
                this.$http.put(apiUrl() + '/user/' + this.id, {
                    username: app.username,
                    email: app.email,
                    password: app.password
                }).then(function(res){
                    app.loading = false;
                    window.localStorage.setItem('success', JSON.stringify([
                                                                          'user ' + app.username + ' telah diubah'
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
