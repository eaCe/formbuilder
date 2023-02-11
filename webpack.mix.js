const mix = require('laravel-mix');

mix.webpackConfig({
    optimization: {
        providedExports: false,
        sideEffects: false,
        usedExports: false
    }
});

mix.js('./resources/js/formbuilder.js', 'assets')
    .postCss('resources/styles/formbuilder.css', 'assets',
        [
            require('tailwindcss'),
        ]);

mix.disableNotifications();
mix.sourceMaps(false, 'source-map');
