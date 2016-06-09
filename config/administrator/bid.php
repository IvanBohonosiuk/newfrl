<?php

return [
	'title' => 'Ставки на проект',
	'single' => 'ставку',
	'model' => 'App\Bid',
	'columns' => [
	    'id',
	    'price',
	    'termin',
	    'description',
	    'private'
	],
	'edit_fields' => [
	    'price' => [
	        'title' => 'Цена',
	        'type' => 'number',
		    'decimals' => 2,
		    'thousands_separator' => ' ',
		    'decimal_separator' => '.'
	    ],
	    'termin' => [
	        'title' => 'Термин',
	        'type' => 'text'
	    ],
	    'private' => [
	        'title' => 'Скрыто',
	        'type' => 'bool'
	    ],
	    'description' => [
	        'title' => 'Содержание',
	        'type' => 'wysiwyg'
	    ],
	    'project' => [
	        'title' => 'Проект',
	        'type' => 'relationship',
	        'name_field' => 'title'
	    ],
	    'user' => [
	        'title' => 'Пользователь',
	        'type' => 'relationship',
	        'name_field' => 'login'
	    ],
	],
	'form_width' => 800,
];