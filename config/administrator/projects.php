<?php

return [
	'title' => 'Проекты',
	'single' => 'проект',
	'model' => 'App\Projects',
	'columns' => [
	    'id',
	    'title',
	    'description',
	    'price',
	    'end_date'
	],
	'edit_fields' => [
	    'title' => [
	        'title' => 'Название',
	        'type' => 'text'
	    ],
	    'active' => [
	        'title' => 'Активно',
	        'type' => 'bool'
	    ],
	    'categories' => [
			'title' => 'Категория',
			'type' => 'relationship',
			'name_field' => 'title'
		],
	    'price' => [
	        'title' => 'Цена',
	        'type' => 'number',
	        'symbol' => 'грн',
		    'decimals' => 2, 
		    'thousands_separator' => ' ',
		    'decimal_separator' => '.'
	    ],
	    'image' => [
	        'title' => 'Изображение',
	        'type' => 'image',
	        'location' => public_path() . '/uploads/projects/originals/',
		    'sizes' => array(
		        array(100, 100, 'auto', public_path() . '/uploads/projects/small/', 100),
		        array(500, 500, 'auto', public_path() . '/uploads/projects/medium/', 100),
		        array(800, 800, 'auto', public_path() . '/uploads/projects/full/', 100)
		    )
	    ],
	    'files' => [
	        'title' => 'Файлы',
	        'type' => 'file',
	        'location' => storage_path() . '/uploads/projects/',
		    'mimes' => 'pdf,psd,doc,docx,jpg,png',

	    ],
	    'description' => [
	        'title' => 'Описание',
	        'type' => 'wysiwyg'
	    ],
	    'remote' => [
	        'title' => 'Удаленная',
	        'type' => 'bool'
	    ],
	    'end_date' => [
	        'title' => 'Дата окончания',
	        'type' => 'datetime',
	        'date_format' => 'd.m.y',
    		'time_format' => 'H:m'

	    ],
	],
	'form_width' => '500'
];