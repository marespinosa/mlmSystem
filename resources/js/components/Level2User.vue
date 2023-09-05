<template>
  <div class="level2-wrapper">
    <div v-if="level2User.showLevel2" class="userTree level2">
      <img :src="profilePicture" alt="Profile Picture" width="80">
      <h6>{{ level2User.name }} {{ level2User.lastname }}</h6>
      <b>Sponsor Id:</b> {{ level2User.generatedId }}
    </div>
  </div>
</template>
<script>
export default {
  props: {
    level2User: Object,
  },
  computed: {
    profilePicture() {
      return this.level2User.profile_picture
        ? this.level2User.profile_picture
        : '/images/favicon.png';
    },
  },
};
</script>