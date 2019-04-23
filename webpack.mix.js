let mix = require('laravel-mix');

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

mix.react('resources/js/app.js', 'public/js')
  .react('resources/js/containers/Desarrolladores', 'public/js')
  .react('resources/js/containers/Proyectos', 'public/js')
  .react('resources/js/containers/Items', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  // .copy('node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js', 'public/js/jquery.dataTables.min.js')
  // .copy('node_modules/admin-lte/plugins/datatables/dataTables.bootstrap4.js', 'public/js/jquery.dataTables.bootstrap4.js')
  .copy('node_modules/pace-js/pace.min.js', 'public/js/pace.min.js')
  .extract([
    'jquery',
    'axios',
    'sweetalert',
    'moment',
    // 'datatables.net-buttons-bs4',
  ])
  .autoload({
    jquery: ['$']
  })
  .version()
  .browserSync({
    proxy: 'items.test',
    files: [
      // 'app/**/*.php',
      'resources/views/**/*.php',
      'public/js/**/*.js',
      'public/css/**/*.css',
      'public/css/app.css',
      'public/js/app.js',
    ]
  });
