<template>
  <div class="search-container">
    <label>Search</label>
    <input v-on:input="search" type="text" />
  </div>
  <Articles :articles="articles" />
</template>

<script setup>
import { useSavedArticles } from "~/composables/useSavedArticles";
import { ref, onMounted } from "vue";

const articles = ref([]);
const { getSavedArticles } = useSavedArticles();

onMounted(() => {
  const savedArticles = getSavedArticles();

  articles.value = savedArticles
    .sort((a, b) => {
      return new Date(b.date) - new Date(a.date);
    })
    .splice(0, 10);
});

function search(el) {
  let search = el.target.value.trim().toLowerCase();
  const savedArticles = getSavedArticles();

  articles.value = savedArticles
    .map((article) => {
      let score = 0;

      const title = article.title.toLowerCase();
      const categories = article.categories.map((c) => c.toLowerCase());
      const articleHtml = article.article.toLowerCase();

      const parser = new DOMParser();
      const doc = parser.parseFromString(articleHtml, "text/html");
      const articleText = doc.body.textContent || "";
      const headings = Array.from(doc.querySelectorAll("h1, h2, h3")).map((h) =>
        h.textContent.toLowerCase()
      );

      if (title.includes(search)) score += 4;
      categories.forEach((cat) => {
        if (cat.includes(search)) score += 3;
      });
      headings.forEach((heading) => {
        if (heading.includes(search)) score += 2;
      });
      if (articleText.includes(search)) score += 1;

      return { ...article, score };
    })
    .filter((a) => a.score > 0)
    .sort((a, b) => b.score - a.score || new Date(b.date) - new Date(a.date));
}
</script>

<style>
.search-container {
  margin-bottom: 20px;
  display: flex;
  gap: 20px;
  align-items: center;
}

.search-container input {
  padding: 6px 8px;
}
</style>
