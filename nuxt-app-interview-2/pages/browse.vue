<template>
  <div>
    <Articles :articles="articles" />
  </div>
</template>

<script setup>
import { useSavedArticles } from "~/composables/useSavedArticles";
import { ref, onMounted } from "vue";

const articles = ref([]);
const { getSavedArticles } = useSavedArticles();

onMounted(() => {
  const savedArticles = getSavedArticles();

  articles.value = savedArticles.sort((a, b) => {
    return new Date(b.date) - new Date(a.date);
  });
});
</script>
