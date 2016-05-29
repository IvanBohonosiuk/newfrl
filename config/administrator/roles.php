<?php

return [
	'title' => 'Роли пользователя',
	'single' => 'роль',
	'model' => 'App\Role',
	'columns' => [
	    'id',
	    'name',
	    'description'
	],
	'edit_fields' => [
	    'name' => [
	        'title' => 'Название',
	        'type' => 'text'
	    ],
	    'description' => [
	        'title' => 'Описание',
	        'type' => 'text'
	    ],
	],
];