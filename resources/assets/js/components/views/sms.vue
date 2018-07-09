<template>
    <div id="page-wrapper" class="sms">
        <div class="container-fluid">
            <div class="row head-page">
                <div class="col-lg-12">
                    <h1 class="page-header">SMS Report</h1>
                    <div class="filter">
                        <button class="Btn-Filter" type="button" data-toggle="modal" data-target="#caridata"><p class="Filter-Search">Filter Search   <i class="fa fa-sliders"></i></p></button>
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
                              @vuetable:pagination-data="onPaginationData">

                    </vuetable>
                    <vuetable-pagination ref="pagination"
                                         :css="css.paginations"
                                         @vuetable-pagination:change-page="onChangePage">
                    </vuetable-pagination>
                </div>
            </div>
            <div class="modal fade" id="caridata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-left">
                            <h4 class="modal-title w-100 font-weight-bold pull-left">Filter Search</h4>
                            <button class="pull-right close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                <span class="lg-search">
                    <i class="fa fa-3x fa-mobile fa-hp"></i>
                </span>
                                <div class="styled-input agile-styled-input-top">
                                    <input type="text" id="MSISDN" name="MSISDN" required="">
                                    <label>Receiver Number (MSISDN)</label>
                                    <span></span>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                    <span class="lg1-search">
                    <i class="fa fa-2x fa-calendar-o fa-cal"></i>
                    </span>
                                        <div class="styled-input agile-styled-input-top">
                                            <input type="text" placeholder="Start Date" id="fromDate" required="" class="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                    <span class="lg1-search">
                    <i class="fa fa-2x fa-calendar-o fa-cal"></i>
                    </span>
                                        <div class="styled-input agile-styled-input-top">
                                            <input type="text" placeholder="End Date" id="toDate" required="" class="datepicker">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn-filter" onclick="$('#caridata').modal('hide')" id="searching">Search <i style="padding-left: 10px" class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable';
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination';

    export default {
        created() {
            this.success = JSON.parse(
                window.localStorage.getItem('success')
            );

            window.localStorage.removeItem('success');
        },
        components: {
            Vuetable,
            VuetablePagination
        },
        data: function() {
            return {
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
            caridata() {
                this.$http.delete(apiUrl() + '/user/' + this.deleteInfo.id)
                    .then(function(res){
                        window.localStorage.setItem('success', JSON.stringify([
                            'User telah dihapus'
                        ]));
                        window.location.assign(window.location.href);
                    })
                    .catch(function(res){

                    });
            }
        }
    }
</script>

