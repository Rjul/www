const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix
    .js("vendor/orchid/platform/public/js/manifest.js", "public/resources/orchid/js")
    .js("vendor/orchid/platform/public/js/manifest.js.map", "public/resources/orchid/js")
    .js("vendor/orchid/platform/public/js/orchid.js", "public/resources/orchid/js")
    .js("vendor/orchid/platform/public/js/orchid.js.map", "public/resources/orchid/js")
    .js("vendor/orchid/platform/public/js/vendor.js", "public/resources/orchid/js")
    .js("vendor/orchid/platform/public/js/vendor.js.map", "public/resources/orchid/js")
    .postCss("vendor/orchid/platform/public/css/orchid.css", "public/resources/orchid/css");
