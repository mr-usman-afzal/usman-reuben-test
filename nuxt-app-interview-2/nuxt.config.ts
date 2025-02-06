// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  modules: [
    'dayjs-nuxt',
  ],
  app: {
    head: {
      script: [
        {
          src: "https://code.jquery.com/jquery-3.4.1.slim.min.js",
        },
        {
          src: "https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"
        }
      ],
      link: [
        {
          rel: "stylesheet",
          href: "https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css"
        }
      ]
    },
  },
})
