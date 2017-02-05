const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
	    mix.styles([
		    'main.css',
			'flags.css'
		]);

	    mix.scripts([
		    'main.js'
		]);

	    mix.copy('resources/assets/img', 'public/img');
});
