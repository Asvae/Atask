var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    var paths = {
        'jquery': './vendor/bower_components/jquery/',
        'bootstrap': './vendor/bower_components/bootstrap-sass-official/assets/',
        'font_awesome': './vendor/bower_components/font-awesome/'
    }

    var paths_js = [
        paths.jquery + "dist/jquery.js",
        paths.bootstrap + "javascripts/bootstrap.js",
    ]

    var paths_scss = [
        paths.bootstrap + 'stylesheets/',
        "sass/bootstrap_grey/",
        paths.font_awesome + 'scss/',
    ]

    var paths_fonts = [
        paths.bootstrap + 'fonts/bootstrap/**',
        paths.font_awesome + 'fonts/**',
    ]

    elixir(function(mix) {
        mix.sass("app.scss", 'public/css/', {includePaths: paths_scss})
            .copy(paths_fonts, 'public/fonts')
            .scripts( paths_js, 'public/js/vendor.js', './')
            .scripts( 'script.js')
            .version(["public/css/app.css","public/js/vendor.js", "public/js/all.js"]);
    });

});
