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

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/yall.js', 'public/js')
    .version();

mix.copyDirectory('public/css', 'storage/app/public/css');
mix.copyDirectory('public/js', 'storage/app/public/js');



var tailwindcss = require('tailwindcss');

mix.postCss('resources/assets/css/tailwind.css', 'public/css', [
  tailwindcss('./tailwind-config.js'),
]);


let glob = require("glob-all");
let PurgecssPlugin = require("purgecss-webpack-plugin");

// Custom PurgeCSS extractor for Tailwind that allows special characters in
// class names.
//
// https://github.com/FullHuman/purgecss#extractor
class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
  }
}

// mix.postCss("resources/assets/css/tailwind.css", "public/css", [tailwindcss("./tailwind.js")]);

// Only run PurgeCSS during production builds for faster development builds
// and so you still have the full set of utilities available during
// development.
if (mix.inProduction()) {
  mix.webpackConfig({
    plugins: [
      new PurgecssPlugin({

        // Specify the locations of any files you want to scan for class names.
        paths: glob.sync([
          path.join(__dirname, "resources/views/layouts/blog.blade.php"),
          path.join(__dirname, "resources/views/posts/show.blade.php"),
          path.join(__dirname, "resources/views/posts/index.blade.php"),
        //   path.join(__dirname, "resources/views/layouts/create.blade.php"),
        //   path.join(__dirname, "resources/views/layouts/edit-vue.blade.php"),
          path.join(__dirname, "resources/assets/js/components/Images.vue")
        ]),
        extractors: [
          {
            extractor: TailwindExtractor,

            // Specify the file extensions to include when scanning for
            // class names.
            extensions: ["html", "js", "php", "vue"]
          }
        ]
      })
    ]
  });
}