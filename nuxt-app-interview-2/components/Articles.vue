<template>
  <div class="grid">
    <Article
      :article="article"
      v-for="article of articles"
      :key="article.title"
    />
  </div>
</template>

<script setup>
const props = defineProps({
  articles: {
    type: Array,
    required: true,
  },
});
</script>

<style scoped>
.grid {
  display: flex;
  flex-wrap: wrap;
}

.grid > * {
  width: calc(100% / 3);
}
</style>
