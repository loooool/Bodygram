var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    .styles([
        'icons.css',
        'style.css',
        'style_dark.css',
        'bootstrap.min.css'
    ], './public/js/libs.css')


        .scripts([
            'bootstrap.js',
            'detect.js',
            'fastclick.js',
            'jquery.app.js',
            'jquery.blockUI.js',
            'jquery.core.js',
            'jquery.min.js',
            'jquery.nicescroll.js',
            'jquery.scrollTo.min.js',
            'jquery.slimscroll.js',
            'modernizr.min.js',
            'popper.min.js',
            'skycons.min.js',
            'tether.min.js',
            'waves.js',
            'wow.min.js'
        ], './public/js/libs.css')
});
