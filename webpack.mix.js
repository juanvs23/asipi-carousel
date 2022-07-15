let mix = require("laravel-mix");

mix
  .js("src/frontend/js/index.js", "js/frontend/main.js")

  .js("src/admin/js/back.js", "js/admin/main.js")

  .sass("src/frontend/scss/index.scss", "css/frontend/main.css")
  .sass("src/admin/scss/back.scss", "css/admin/styles.css")
  ///.react()
  .setPublicPath("assets")
  .sourceMaps()
  .version();
