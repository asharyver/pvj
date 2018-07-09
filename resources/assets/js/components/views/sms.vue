<template>
    <div id="page-wrapper" class="sms">
        <div class="container-fluid">
            <div class="row head-page">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1>SMS Report</h1>
                        <div class="btn-sms pull-right">
                            <button class="btn btn-warning">Download CSV</button>
                            <button class="btn btn-filter" data-toggle="modal" data-target="#filterModal">Search Filter</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="alert alert-success" v-for="val in success">
                        {{ val }}
                    </div>
                    <vuetable ref="vuetable"
                              v-bind:api-url="APIUrl + '/sms'"
                              v-bind:fields="fields"
                              pagination-path=""
                              v-bind:css="css.table"
                              v-bind:sort-order="sortOrder"
                              v-bind:multi-sort="true"
                              v-bind:http-options = "options"
                              :append-params="moreParams"
                              @vuetable:pagination-data="onPaginationData">

                    </vuetable>
                    <vuetable-pagination ref="pagination"
                                         :css="css.paginations"
                                         @vuetable-pagination:change-page="onChangePage">
                    </vuetable-pagination>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="filterModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Search Filter</h4>
                    </div>
                    <div class="modal-body">
                        <form v-on:submit="filter()">
                            <div class="form-group">
                                <!-- <label for="">Receiver Number (MSISDN)</label> -->
                                <input type="text" class="form-control" v-model="msisdn" placeholder="Receiver Number (MSISDN)" @keyup.enter="doFilter">
                            </div>
                            <div class="form-group">
                                <!-- <label for="">Date range</label> -->
                                <div class="col-md-6">
                                    <date-picker  @keyup.enter="doFilter" v-model="startDate" :config="config" placeholder="Start Date"></date-picker>
                                </div>
                                <div class="col-md-6">
                                    <date-picker  @keyup.enter="doFilter" v-model="endDate" :config="config" placeholder="End Date"></date-picker>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="doFilter" class="btn btn-info pull-left">Search</button>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable';
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination';
    
    // Import this component
    import DatePicker from 'vue-bootstrap-datetimepicker';

    // Import date picker css
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
    
    export default {
        mounted() {
            this.$events.$on('filter-set', eventData => this.onFilterSet(eventData))
            this.$events.$on('filter-reset', e => this.onFilterReset())
        },
        created() {
            this.success = JSON.parse(
                window.localStorage.getItem('success')
            );

            window.localStorage.removeItem('success');
        },
        components: {
            Vuetable,
            VuetablePagination,
            DatePicker
        },
        data: function() {
            return {
                date: new Date(),
                config: {
                    format: 'YYYY-MM-DD HH:mm',
                    useCurrent: false,
                    sideBySide: true
                },
                startDate: null,
                endDate: null,
                msisdn: null,
                
                success: [],
                deleteInfo: [],
                options: {
                    headers: {
                        Authorization: 'Bearer ' + window.localStorage.getItem('default_auth_token')
                    }
                },
                fields: [{
                    name: 'received',
                    sortField: 'received',
                    title: 'Received'
                },{
                    name: 'amount',
                    sortField: 'amount',
                    title: 'Amount (Rp)'
                },{
                    name: 'receiver',
                    sortField: 'receiver',
                    title: 'Receiver'
                },{
                    name: 'sdn',
                    sortField: 'sdn',
                    title: 'MSISDN'
                }],
                css: {
                    table: {
                        tableClass: 'table table-bordered table-hover sms-table',
                        ascendingIcon: 'fa fa-angle-up',
                        descendingIcon: 'fa fa-angle-down'
                    },
                    paginations: {
                        wrapperClass: 'paginations',
                        activeClass: 'active',
                        disabledClass: '',
                        pageClass: 'page-item',
                        linkClass: 'page-item',
                        icons: {
                            first: 'fa fa-angle-double-left',
                            prev: 'fa fa-angle-left',
                            next: 'fa fa-angle-right',
                            last: 'fa fa-angle-double-right',
                        },
                    },
                    icons: {
                        first: 'glyphicon glyphicon-step-backward',
                        prev: 'glyphicon glyphicon-chevron-left',
                        next: 'glyphicon glyphicon-chevron-right',
                        last: 'glyphicon glyphicon-step-forward',
                    }
                },
                sortOrder: [{
                    field: 'received',
                    sortField: 'received',
                    direction: 'asc'
                }
                ],
                moreParams: {}
            };
        },
        methods: {
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                // this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            showRow(rowData){
                let id = rowData.id;
                this.$router.push({name: 'show.user', params: {id}})
            },
            editRow(rowData) {
                let id = rowData.id;
                this.$router.push({name: 'edit.user', params: {id}})
            },
            deleteRow(rowData){
                this.deleteInfo = rowData;
            },
            deleteUser() {
                this.$http.delete(apiUrl() + '/user/' + this.deleteInfo.id)
                    .then(function(res){
                        window.localStorage.setItem('success', JSON.stringify([
                            'User telah dihapus'
                        ]));
                        window.location.assign(window.location.href);
                    })
                    .catch(function(res){

                    });
            },
            doFilter () {
                this.$events.fire('filter-set', JSON.stringify({
                    msisdn: this.msisdn,
                    startDate: this.startDate,
                    endDate: this.endDate
                }))
            },
            resetFilter () {
                this.msisdn = null  // clear the text in text input
                this.startDate = null
                this.endDate = null
                this.$events.fire('filter-reset')
            },
            onFilterSet (str) {
                let data = JSON.parse(str)
                this.moreParams = {
                    'msisdn': data.msisdn,
                    'start-date': data.startDate,
                    'end-date': data.endDate
                }
                
                let vm = this
                Vue.nextTick( function() {
                    vm.$refs.vuetable.refresh()
                })
            },
            onFilterReset () {
                this.moreParams = {}
                let vm = this
                Vue.nextTick( function() {
                    vm.$refs.vuetable.refresh()
                })
            }
        }
    }
</script>
