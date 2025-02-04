<template>
  <div>
    <h4>Create New</h4>
    <form v-on:submit="saveArticle">
      <div>
        <label for="">Title</label>
        <input name="title" type="text" />
      </div>
      <div>
        <label for="">Date</label>
        <input name="date" type="date" />
      </div>
      <div>
        <label for="">Category</label>
        <input name="category" type="text" />
      </div>
      <div>
        <label for="">Article</label>
        <textarea name="article"></textarea>
      </div>
      <div>
        <button type="submit">Publish</button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { onMounted } from "vue";

onMounted(() => {
  if (window.CKEDITOR) {
    CKEDITOR.replace("article");
  }
});

function saveArticle(formData) {
  formData.preventDefault();

  let form = formData.target;
  let title = form.title.value;
  let date = form.date.value;
  let category = form.category.value;
  let article = CKEDITOR.instances.article.getData();

  let savedArticles = localStorage.getItem("savedArticles") || "[]";
  savedArticles = JSON.parse(savedArticles);
  localStorage.setItem(
    "savedArticles",
    JSON.stringify([...savedArticles, { title, date, category, article }])
  );

  return false;
}
</script>
