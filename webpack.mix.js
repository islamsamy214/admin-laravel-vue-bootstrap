const mix = require("laravel-mix");
<<<<<<< HEAD
const path = require('path')
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js("resources/js/app.js", "public/js")
    .autoload({
        jquery: ["$", "window.jQuery"],
    })
    .sourceMaps()
    .sass("resources/sass/app.scss", "public/css")
    .vue({ version: 3 })
    .disableNotifications();
