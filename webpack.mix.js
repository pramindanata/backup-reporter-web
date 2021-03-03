/* eslint-disable @typescript-eslint/no-var-requires */
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

mix.ts('resources/js/pages/login.ts', 'public/js/pages');
mix.ts('resources/js/pages/user/create.ts', 'public/js/pages/user');

mix
  .ts('resources/js/app.ts', 'public/js')
  .sass('resources/css/app.scss', 'public/css');

if (mix.inProduction()) {
  mix.version();
}
