<template>
  <div>
    <h4>Create New</h4>
    <form v-on:submit="saveArticle">
      <table>
        <tbody>
          <tr>
            <th><label for="">Title</label></th>
            <td><input name="title" required type="text" /></td>
          </tr>
          <tr>
            <th><label for="">Date</label></th>
            <td><input name="date" required type="date" /></td>
          </tr>
          <tr>
            <th><label for="">Category</label></th>
            <td><input name="category" type="text" /></td>
          </tr>
          <tr>
            <th><label for="">Image</label></th>
            <td>
              <input
                name="image"
                v-on:change="handleFileChange"
                accept="image/*"
                type="file"
              />
            </td>
          </tr>
          <tr>
            <th><label for="">Article</label></th>
            <td></td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="article"></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><button type="submit">Publish</button></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</template>

<script setup>
import { useSavedArticles } from "~/composables/useSavedArticles";
import { ref, onMounted } from "vue";

const imageData = ref(null);
const { getSavedArticles } = useSavedArticles();

onMounted(() => {
  $('[name="article"]').summernote({
    height: "300px",
  });
  setTimeout(() => {
    $('[name="article"]').summernote("code", "");
  }, 100);
});

function handleFileChange(el) {
  const fileInput = el.target;

  imageData.value = null;

  if (fileInput.files.length) {
    const fr = new FileReader();
    fr.onload = () => {
      imageData.value = fr.result;
    };
    fr.readAsDataURL(fileInput.files[0]);
  }
}

function saveArticle(formData) {
  formData.preventDefault();

  let savedArticles = getSavedArticles();

  let form = formData.target;
  let title = form.title.value;

  if (savedArticles.find((x) => x.title == title)) {
    alert("Article with same title already exists.");
    return;
  }

  let date = form.date.value;
  let image = imageData.value;
  let categories = form.category.value.split(",").map((x) => x.trim());
  let article = $('[name="article"]').summernote("code");

  localStorage.setItem(
    "savedArticles",
    JSON.stringify([
      ...savedArticles,
      { title, date, categories, image, article },
    ])
  );

  form.reset();
  $('[name="article"]').summernote("code", "");

  return false;
}
</script>

<style>
form table td,
form table th {
  vertical-align: middle;
}

form table th {
  text-align: left;
  font-weight: normal;
}

form table td input {
  width: 100%;
  padding: 6px 8px;
}

form [type="submit"] {
  padding: 8px 12px;
  cursor: pointer;
}

.note-editor .note-editable {
  background-color: #fff;
}
</style>
