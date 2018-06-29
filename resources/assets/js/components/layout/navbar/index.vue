<script>
import TopLinks from './TopLinks'
import sidebar from '../sidebar'

export default {
  name: 'navbar',
  components: { TopLinks,
                 sidebar
                 }
}
</script>

<template>
  <div>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <img class="pay" src="static/assets/img/brand.png">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <template v-for="n in 3"> <span class="icon-bar"></span> </template>
        </button>
        <router-link :to="{ name: 'home' }" class="navbar-brand">Merchant Portal</router-link>
      </div>
      <sidebar/>
      <top-links/>
    </nav>
    <router-view></router-view>
  </div>
</template>
