<template>
  <main>
    <aside>
      <ul>
        <li><NuxtLink href="/">Screen 1</NuxtLink></li>
        <li><NuxtLink href="/screen-2">Screen 2</NuxtLink></li>
        <li><NuxtLink href="/screen-3">Screen 3</NuxtLink></li>
      </ul>
    </aside>
    <div class="container">
      <slot />
    </div>
  </main>
</template>

<style>
main {
  display: flex;
}

main aside {
  width: 20%;
  background-color: rgb(205, 224, 243);
}

main aside ul {
  list-style-type: none;
}

.container {
  width: 80%;
  background-color: rgb(211, 241, 212);
  padding: 10px;
}
</style>
