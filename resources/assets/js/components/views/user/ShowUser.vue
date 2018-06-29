<template>
    <main class="main">
        <headful
            v-bind:title="'Menampilkan ' + username + ' - ' + appName"
            description="User"
        />
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                {{ username }}
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Username</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ username }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Alamat Email</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ email }}</p>
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
        created() {
            let app = this;
            this.id = this.$route.params.id;
            this.$http.get(apiUrl() + '/user/' + this.id)
                .then(function(res) {
                    res = res.data;
                    app.id = res.id;
                    app.username = res.username;
                    app.email = res.email;
                })
                .catch(function(res) {
                    
                })
        },
        data: function() {
            return {
                id: null,
                username: null,
                email: null
            }
        }
    }
</script>
