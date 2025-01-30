<template>
  <div>
    <div class="search-container">
      <label>Search:</label>
      <input name="search" v-on:input="search" />
    </div>
    <hr />
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="loading">
            <td colspan="4">Loading...</td>
          </tr>
          <tr v-else-if="error">
            <td colspan="4">Error: {{ error.message }}</td>
          </tr>
          <tr v-for="record in data.data" :key="record.id">
            <td>{{ record.id }}</td>
            <td>{{ record.title }}</td>
            <td>{{ record.status }}</td>
            <td>{{ record.notes }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const queryParams = ref({ search: "" });

const { data, error, loading } = useFetch(
  "http://localhost:8000/api/screen-1-data",
  {
    query: queryParams,
  }
);

const search = (e) => {
  let search = e.target.value;
  queryParams.value = { ...queryParams.value, ...{ search } };
};
</script>

<style>
table {
  width: 100%;
  border: 1px solid #000;
  border-collapse: collapse;
}

table th,
table td {
  border: 1px solid #000;
  padding: 12px;
}
</style>
