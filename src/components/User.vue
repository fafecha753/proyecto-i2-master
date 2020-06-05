<template>
  <div class="users">
    <h1>USER COMP</h1>

    <!-- <ul>
      <li v-for="user in users" v-bind:key="users.name">{{user.name}} - {{user.email}}</li>
    </ul>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [
        {
          name: "Joe",
          email: "joe@g.c"
        },
        {
          name: "Alm",
          email: "Alm@g.c"
        }
      ]
    };
  }
};
</script>

<style lang="css">
.users {
  background-color: #333;
}
</style>