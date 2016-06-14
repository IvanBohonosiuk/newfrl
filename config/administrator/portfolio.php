<?php

return [
	'title' => 'Портфолио',
	'single' => 'проект',
	'model' => 'App\Portfolio',
	'columns' => [
	    'id',
	    'name',
	    'url',
	    'image',
	    'description',
	    'price',
	],
	'edit_fields' => [
	    'name' => [
	        'title' => 'Название',
	        'type' => 'text'
	    ],
	    'url' => [
	        'title' => 'Ссылка',
	        'type' => 'text'
	    ],
	    'image' => [
	        'title' => 'Изображение',
	        'type' => 'image',
		    'location' => public_path() . '/uploads/portfolio/originals/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 2,
		    'sizes' => array(
		        array(65, 57, 'auto', public_path() . '/uploads/portfolio/small/', 100),
		        array(220, 138, 'auto', public_path() . '/uploads/portfolio/medium/', 100),
		        array(383, 276, 'auto', public_path() . '/uploads/portfolio/full/', 100)
		    )
	    ],
	    'description' => [
	        'title' => 'Описание',
	        'type' => 'wysiwyg'
	    ],
	    'price' => [
	        'title' => 'Цена',
	        'type' => 'number',
		    'symbol' => '$',
		    'decimals' => 2,
		    'thousands_separator' => ' ',
		    'decimal_separator' => '.'
	    ],
	],
];