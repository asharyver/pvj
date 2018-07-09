<script>
import Dropdown from './Dropdown'
import Message from './type/Message'
import Task from './type/Task'

export default {
  name: 'TopLinks',
  components: { Dropdown, Message, Task },
  data: function () {
    return {
      tasks: [
        { name: 'Task 1', complete: '40', type: 'success' },
        { name: 'Task 2', complete: '20', type: 'info' },
        { name: 'Task 3', complete: '60', type: 'warning' },
        { name: 'Task 4', complete: '80', type: 'danger' }
      ]
    }
  }
}
</script>

<template>
    <ul class="nav navbar-top-links navbar-right">
        <dropdown>
            <li><router-link v-bind:to="{name: 'edit.profil'}"><i class="fa fa-user-circle-o fa-fw"></i> User Profile</router-link></li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </dropdown>
    </ul>
</template>
