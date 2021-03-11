/* eslint-disable @typescript-eslint/no-var-requires */
const mix = require('laravel-mix');
const path = require('path');

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
mix.alias({
  '@': path.join(__dirname, 'resources/js'),
});

mix.ts('resources/js/pages/login.ts', 'public/js/pages');
mix
  .ts('resources/js/pages/user/index.ts', 'public/js/pages/user')
  .ts('resources/js/pages/user/create.ts', 'public/js/pages/user')
  .ts('resources/js/pages/user/show.ts', 'public/js/pages/user');

mix
  .ts(
    'resources/js/pages/access-token/index.ts',
    'public/js/pages/access-token',
  )
  .ts(
    'resources/js/pages/access-token/show.ts',
    'public/js/pages/access-token',
  );

mix
  .ts(
    'resources/js/pages/backup-report-log/index.ts',
    'public/js/pages/backup-report-log',
  )
  .ts(
    'resources/js/pages/backup-report-log/show.ts',
    'public/js/pages/backup-report-log',
  );

const sourceMapIsGeneratedForProduction = false;

mix
  .ts('resources/js/app.ts', 'public/js')
  .sass('resources/css/app.scss', 'public/css')
  .sourceMaps(sourceMapIsGeneratedForProduction);

if (mix.inProduction()) {
  mix.version();
}
