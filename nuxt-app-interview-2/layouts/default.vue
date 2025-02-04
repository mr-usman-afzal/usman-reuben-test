<template>
  <main>
    <div class="left-section">
      <nav>
        <ul>
          <li>
            <NuxtLink href="/create-new">Create New</NuxtLink>
          </li>
          <li>
            <NuxtLink href="/search">Search</NuxtLink>
          </li>
          <li>
            <NuxtLink href="/browse">Browse</NuxtLink>
          </li>
        </ul>
      </nav>
    </div>
    <div class="center-section">
      <slot />
    </div>
    <div class="right-section" v-html="dynamicContent"></div>
  </main>
</template>

<script setup>
const dynamicContent = useState("dynamicContent", () => "");
</script>

<style>
* {
  box-sizing: border-box;
}

html,
body {
  margin: 0;
}

main {
  display: flex;
}

.left-section,
.right-section {
  background-color: rgb(203, 223, 240);
  width: 20%;
  min-height: 100vh;
  padding: 10px;
}

.center-section {
  background-color: rgb(209, 236, 211);
  width: 60%;
  min-height: 100vh;
  padding: 10px;
}
</style>
