<template>
    <div id="page-wrapper" class="sms">
        <div class="container-fluid">
            <div class="row head-page">
                <div class="col-lg-12">
                    <h1 class="page-header">SMS Report</h1>

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
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete {{ deleteInfo.name }} ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete : {{ deleteInfo.name }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteUser">Delete</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
            }
        }
    }
</script>
