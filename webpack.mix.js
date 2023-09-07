const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
      extensions: ['*', '.wasm','.jpg','.png', '.mjs', '.js', '.jsx', '.json'],
    },
  });



mix.js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/extras/jquery/*.min.js', 'public/js')
    .copy('resources/assets/extras/jquery/*.js', 'public/js')
    .copy('resources/assets/extras/bootstrap/js/*.min.js', 'public/js')
    .copy('resources/assets/extras/bootstrap/js/*.bundle.min.js', 'public/js')
    .copy('resources/assets/extras/jquery-easing/*.easing.min.js', 'public/js')
    .copy('resources/assets/extras/jquery-easing/*.easing.compatibility.js', 'public/js')
    .copy('resources/assets/css/*.min.css', 'public/css')
    .copy('resources/assets/extras/fontawesome-free/css/*.min.css', 'public/css')
    .copy('resources/assets/extras/fontawesome-free/css/*.css', 'public/css')


    .copy('resources/assets/css/*.css', 'public/css')
    
    .copy('resources/assets/extras/chart/*.js', 'public/js')
    .copy('resources/assets/extras/chart/*.min.js', 'public/js')
    .copy('resources/assets/js/demo/*.js', 'public/js')
    
mix.copyDirectory('resources/assets/img', 'public/images');
mix.copyDirectory('resources/assets/css/banner', 'public/images');
mix.copyDirectory('resources/views/settings/profile_images', 'public/images');


mix.sass('resources/sass/app.scss', 'public/css');
