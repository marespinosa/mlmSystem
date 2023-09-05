<template>
    <div class="treetabs">
      <ul class="nav nav-tabs">
        <Level1User
          v-for="(level2User, index) in downlineUsers.level2"
          :key="index"
          :level2User="level2User"
          @toggle-level2="toggleLevel2(index)"
        ></Level1User>
      </ul>
    </div>
  </template>
  
  <script>
  import Level1User from "./Level1User.vue";
  import Level2User from "./Level2User.vue";
  
  export default {
    props: ["downlineUsers"],
    components: {
      Level1User,
      Level2User,
    },
    methods: {
    toggleLevel2(index) {
      this.$set(this.downlineUsers.level2[index], "showLevel2", !this.downlineUsers.level2[index].showLevel2);
    },
  },
};
</script>