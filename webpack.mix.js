const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .styles(
        ['node_modules/bootstrap/dist/css/bootstrap.css', 
        'theme/css/style.css', 'theme/css/components.css', 
        'theme/css/custom.css'], 
        'public/css/app.css')
    .sass('resources/sass/app.scss', 'public/css')
    .scripts(['theme/js/stisla.js', 'theme/js/scripts.js', 'theme/js/custom.js'], 'public/js/app.js')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
