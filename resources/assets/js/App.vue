<template>
    <div v-if="$auth.check()" class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        <app-navbar></app-navbar>
    </div>
    <div v-else class="app flex-row align-items-center">
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                isLogin: null
            }
        },
        created() {
            this.isLogin = ! this.$auth.check()
        }
    }
</script>
