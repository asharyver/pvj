<script>
//  import auth from '../../auth'
  export default {
    data() {
      return {
        quote: ''
      }
    },
//    methods: {
//      getQuote() {
//        this.$http
//          .get('http://localhost:8081', (data) => {
//            this.quote = data;
//          }, {
//            // Attach the JWT header
//            headers: auth.getAuthHeader()
//          })
//          .error((err) => console.log(err))
//      }
//    },
//    route: {
//      // Check the users auth status before
//      // allowing navigation to the route
//      canActivate() {
//        return auth.user.authenticated
//      }
//    }
  }
</script>
  <!--<script>-->
  <!--import auth from '../../auth'-->
  <!--import axios from 'axios'-->
  <!--export default {-->
    <!--data() {-->
      <!--return {-->
        <!--quote: ''-->
      <!--}-->
    <!--},-->
    <!--methods: {-->
      <!--getQuote() {-->
          <!--axios.get('http://localhost:8081/cekuser', (data) => {-->
            <!--this.quote = data;-->
          <!--}, {-->
            <!--// Attach the JWT header-->
            <!--headers: auth.getAuthHeader()-->
          <!--})-->
          <!--.error((err) => console.log(err))-->
      <!--}-->
    <!--},-->
    <!--route: {-->
      <!--// Check the users auth status before-->
      <!--// allowing navigation to the route-->
      <!--canActivate() {-->
        <!--return auth.user.authenticated-->
      <!--}-->
    <!--}-->
  <!--}-->
  <!--</script>-->
