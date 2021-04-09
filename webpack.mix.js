let mix = require('laravel-mix');

mix.js('src/js/main.js', 'dist').vue();

mix.css('src/css/app.css', 'dist');