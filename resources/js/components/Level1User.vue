<template>
  <li>
    <a href="#" data-toggle="tab" @click="toggleLevel2">
      <div class="userTree">
        <img
          v-if="level1User.profile_picture"
          :src="level1User.profile_picture"
          :alt="level1User.name"
          width="80"
        />
        <img
          v-else
          :src="'/images/favicon.png'"
          :alt="level1User.name"
          width="80"
        />

        {{ level1User.name }} {{ level1User.lastname }} <br />
        <b>Sponsor Id:</b> {{ level1User.generatedId }}
      </div>
    </a>

  
    <ul>
      <Level2User
        v-for="level2User in level1User.level2"
        :key="level2User.name"
        :level2User="level2User"
      ></Level2User>
    </ul>
  </li>
</template>

<script>
export default {
  props: {
    level1User: Object,
  },
  methods: {
    toggleLevel2() {
      console.log("Toggle Level 2 clicked");
      this.$emit("toggle-level2", this.level2User); 
    },
  },
};
</script>
