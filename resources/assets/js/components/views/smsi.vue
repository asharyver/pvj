<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row head-page">
                <div class="col-lg-12">
                    <h1 class="page-header">{{msg}}</h1>
                  <table aria-describedby="example1_info" role="grid" id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr role="row">
                      <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 167px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_asc">No</th>
                      <th aria-label="Browser: activate to sort column ascending" style="width: 207px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Received</th>
                      <th aria-label="Platform(s): activate to sort column ascending" style="width: 182px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Amount</th>
                      <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Receiver</th>
                      <th aria-label="CSS grade: activate to sort column ascending" style="width: 101px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Messsage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in results">
                      <td class="sorting_1">{{no}}</td>
                      <td>{{item.received}}</td>
                      <td>{{item.amount}}</td>
                      <td>{{item.receiver}}</td>
                      <td>{{item.message}}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import $ from 'jquery'
  import axios from 'axios'
  // Require needed datatables modules
  import 'datatables.net'
  import 'datatables.net-bs'

  export default {
    name: 'sms',
    methods: {
      getItem(){
        axios.defaults.headers.common['token'] = this.$session.get('token');
        axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
        axios.get('http://localhost:8081/sms')
          .then(
            response => {
              this.results = response.data.sms
            },
          )
      }
    },
    mounted () {
      this.$nextTick(() => {
        $('#example1').DataTable()
      })
      this.getItem()
    },
    data(){
      return{
        msg: 'SMS Reports',
        no: '1',
        received: '',
        amount: '',
        receiver: '',
        message: '',
        results:[],
      }
    }
  }
</script>
<style>
  /* Using the bootstrap style, but overriding the font to not draw in
     the Glyphicons Halflings font as an additional requirement for sorting icons.

     An alternative to the solution active below is to use the jquery style
     which uses images, but the color on the images does not match adminlte.

  @import url('/static/js/plugins/datatables/jquery.dataTables.min.css');
  */

  @import url('../../../static/assets/js/datatables/dataTables.bootstrap.css');

  table.dataTable thead .sorting:after,
  table.dataTable thead .sorting_asc:after,
  table.dataTable thead .sorting_desc:after {
    font-family: 'FontAwesome';
  }

  table.dataTable thead .sorting:after {
    content: "\f0dc";
  }

  table.dataTable thead .sorting_asc:after {
    content: "\f0dd";
  }

  table.dataTable thead .sorting_desc:after {
    content: "\f0de";
  }
</style>
