<?php

return [
	'title' => 'Категории проектов',
	'single' => 'категорию',
	'model' => 'App\Project_cat',
	'columns' => [
	    'id',
	    'active',
	    'weight',
	    'title'
	],
	'edit_fields' => [
	    'active' => [
	        'title' => 'Активно',
	        'type' => 'bool'
	    ],
	    'weight' => [
	        'title' => 'Позиция',
	        'type' => 'number'
	    ],
	    'title' => [
	        'title' => 'Название',
	        'type' => 'text'
	    ],
	    'slug' => [
	        'title' => 'Слаг',
	        'type' => 'text'
	    ],
	    'img' => [
	        'title' => 'Изображение',
	        'type' => 'image',
	        'location' => public_path() . '/uploads/projects_cat/originals/',
	        'sizes' => [
		        [32, 32, 'auto', public_path() . '/uploads/projects_cat/small/', 100],
		        [100, 100, 'auto', public_path() . '/uploads/projects_cat/medium/', 100]
		    ]
	    ],
	],
];