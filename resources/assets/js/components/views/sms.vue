<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row head-page">
                <div class="col-lg-12">
                    <h1 class="page-header">{{msg}}</h1>
                  <data-table :comments="filteredComments"></data-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'
  import Vue from 'vue'

  Vue.component('data-table', {
    render: function (createElement) {
      return createElement(
        "table", null, []
      )
    },
    props: ['comments'],
    data() {
      return {
        headers: [
          { title: 'name' },
          { title: 'email' },
          { title: 'Body' },
        ],
        rows: [] ,
        dtHandle: null,
        comments: [],
        search: ''
      }
    },
    watch: {
      comments(val, oldVal) {
        let vm = this;
        vm.rows = [];
        val.forEach(function (item) {
          let row = [];
          row.push(item.name);
          row.push(item.email);
          row.push(item.body);
          vm.rows.push(row);
        });
        vm.dtHandle.clear();
        vm.dtHandle.rows.add(vm.rows);
        vm.dtHandle.draw();
      }
    },
//    export default {
//      name: 'sms',
//      methods: {
//        getItem(){
//          axios.defaults.headers.common['token'] = this.$session.get('token');
//          axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
//          axios.get('http://localhost:8081/sms')
//            .then(
//              response => {
//                this.results = response.data.sms
//              },
//            )
//        }
//      },
    mounted() {
      let vm = this;
      vm.dtHandle = $(this.$el).DataTable({
        columns: vm.headers,
        data: vm.rows,
        searching: true,
        paging: true,
        info: false
      });
      $.ajax({
        url: 'https://jsonplaceholder.typicode.com/comments',
        success(res) {
          vm.comments = res;
        }
      });
    }
  });

//    methods: {
//        getItem(){
//          axios.defaults.headers.common['token'] = this.$session.get('token');
//          axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
//          axios.get('http://localhost:8081/sms')
//            .then(
//              response => {
//                this.results = response.data.sms
//              },
//            )
//        }
//      },
//    mounted(){
//      this.getItem()
//    }
</script>
