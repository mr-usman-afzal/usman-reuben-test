// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  app: {
    head: {
      script: [
        {
          src: "https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js",
        },
      ],
    },
  },
})
