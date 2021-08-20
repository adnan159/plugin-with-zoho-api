let mix = require('laravel-mix');

mix.js('assets/front/src/input/index.js', 'assets/front/js/input.js').react();
mix.js('assets/front/src/output/index.js', 'assets/front/js/output.js').react();

mix.options({
  terser: {
    extractComments: false,
  }
});
