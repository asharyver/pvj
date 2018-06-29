<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row head-page">
                <div class="col-lg-12">
                  <h1 class="page-header">SMS Report</h1>
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge">17</div>
                            <div>Data User</div>
                          </div>
                        </div>
                      </div>
                      <a href="#">
                        <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge">19</div>
                            <div>Data Merchant</div>
                          </div>
                        </div>
                      </div>
                      <a href="#">
                        <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge">21</div>
                            <div>Data Customer</div>
                          </div>
                        </div>
                      </div>
                      <a href="#">
                        <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge">22</div>
                            <div>Data </div>
                          </div>
                        </div>
                      </div>
                      <a href="#">
                        <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'hello',
  data () {
    return { }
  },
  beforeCreate: function () {
    if (!this.$session.exists()) {
      this.$router.push('/login')
    }
  },
  methods: {
    logout: function () {
      this.$session.destroy()
      this.$router.push('/')
    }
  }
}
</script>
