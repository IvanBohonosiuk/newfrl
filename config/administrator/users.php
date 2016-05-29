<?php

return [
	'title' => 'Все пользователи',
	'single' => 'пользователя',
	'model' => 'App\User',
	'columns' => [
	    'id',
	    'login',
	    'email',
	    'first_name',
	    'last_name'
	],
	'edit_fields' => [
	    'login' => [
	        'title' => 'Логин',
	        'type' => 'text'
	    ],
	    'email' => [
	        'title' => 'E-mail',
	        'type' => 'text'
	    ],
	    'first_name' => [
	        'title' => 'Имя',
	        'type' => 'text'
	    ],
	    'last_name' => [
	        'title' => 'Фамилия',
	        'type' => 'text'
	    ],
	    'roles' => [
		    'type' => 'relationship',
		    'title' => 'Роль пользователя',
		    'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
		],
	],
];