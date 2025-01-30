<template>
  <div class="search-container">
    <label>Search:</label>
    <input name="search" />
  </div>
  <hr />
  <div>
    <img
      v-if="!loading"
      :src="data.data.urls.full"
      :alt="data.data.alt_description"
    />
  </div>
</template>

<script setup>
const { data, loading, error } = useFetch(
  "http://localhost:8000/api/screen-2-data"
);
</script>

<style>
img {
  display: block;
  margin: 0 auto;
  width: 50%;
}
</style>
