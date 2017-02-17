const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
	    mix.styles([
		    'main.css',
			'flags.css',
            'bs-callout.css'
		]);

	    mix.scripts([
		    'main.js'
		]);

	    mix.copy('resources/assets/img', 'public/img');

        mix.copy('resources/assets/js/radarChart.js', 'public/js/radarChart.js');
});
