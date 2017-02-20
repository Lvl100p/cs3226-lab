const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');


elixir(function (mix) {

    mix.scripts([
        'main.js'
    ]);

    mix.copy('resources/assets/img', 'public/img');

    mix.copy('resources/assets/css', 'public/css')

    mix.copy('resources/assets/js/', 'public/js/');
});