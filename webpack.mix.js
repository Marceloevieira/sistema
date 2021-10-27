const mix = require('laravel-mix');

mix.options({
processCssUrls: false
});


 mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/budget.js', 'public/js')
	.js('resources/js/product.js', 'public/js')
	.version();
 
 mix.sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts')
    .version();
