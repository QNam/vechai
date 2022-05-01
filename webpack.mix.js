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

// mix.js('resources/js/app.js', 'public/js/admin.js')
//     .sass('resources/sass/app.scss', 'public/css/admin.css');

mix.styles([
    'public/libs/font-awesome-4.7.0/css/font-awesome.min.css',
    'public/libs/bootstrap-4.4.1/css/bootstrap.min.css',
    'public/libs/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
    'public/libs/jquery-ui-1.12.1/jquery-ui.min.css',
    'public/libs/jquery.tocify.js-v1.9.0-1/src/stylesheets/jquery.tocify.css',
    'public/libs/animate.css/animate.css',
    'public/libs/pushy/css/pushy.css',
    'public/css/custom.css',
    'public/css/sprite.css',
    'public/libs/toastr/build/toastr.min.css',
], 'public/css/app.css');

mix.scripts([
    'public/libs/jquery-3.4.1/jquery-3.4.1.min.js',
    'public/libs/bootstrap-4.4.1/js/bootstrap.min.js',
    'public/libs/pushy/js/pushy.min.js',
    'public/libs/OwlCarousel2-2.3.4/dist/owl.carousel.min.js',
    'public/libs/jquery-ui-1.12.1/jquery-ui.min.js',
    'public/libs/jquery.tocify.js-v1.9.0-1/src/javascripts/jquery.tocify.min.js',
    'public/libs/sticky-1.0.4-4/jquery.sticky.min.js',
    'public/libs/WOW/dist/wow.min.js',
    'public/libs/jquery-validation/jquery-validation.min.js',
    'public/libs/jquery-validation/src/additional/accept.js',
    'public/libs/toastr/build/toastr.min.js',
], 'public/js/app.js');