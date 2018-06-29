
<script>
    export default {
        created(){
            this.$auth.logout({
                makeRequest: true,
                redirect: '/login',
            });
        }
    }
</script>
