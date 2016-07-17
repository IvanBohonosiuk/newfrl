<?php
return [
	'languages' => [
		0  => [
			'code'  => 'ru',
			'title' => 'Русский',
		],
		1  => [
			'code'  => 'ua',
			'title' => 'Українська мова',
		],
		3  => [
			'code'  => 'en',
			'title' => 'English',
		],
		4  => [
			'code'  => 'es',
			'title' => 'Español',
		],
		6  => [
			'code'  => 'de',
			'title' => 'Deutsch',
		],
		7  => [
			'code'  => 'it',
			'title' => 'Italiano',
		],
		12 => [
			'code'  => 'pt',
			'title' => 'Portoghese',
		],
		16 => [
			'code'  => 'fr',
			'title' => 'Français',
		],
	],
	'country'   => [
		'url'    => 'http://api.vk.com/method/database.getCountries?',
		'params' => [
			'v'        => '5.5',
			'need_all' => 1,
			'count'    => 1000,
			'lang'     => null,
			'offset'   => 0,
		],
	],
	'city'      => [
		'url'    => 'http://api.vk.com/method/database.getCities?',
		'params' => [
			'v'          => '5.5',
			'need_all'   => 1,
			'count'      => 100,
			'lang'       => null,
			'offset'     => 0,
			'country_id' => null,
			'region_id'  => null,
		],
	],
];
