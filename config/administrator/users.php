<?php

return [
	'title' => 'Users',
	'single' => 'user',
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
	        'title' => 'login',
	        'type' => 'text'
	    ],
	    'email' => [
	        'title' => 'E-mail',
	        'type' => 'text'
	    ],
	    'first_name' => [
	        'title' => 'First Name',
	        'type' => 'text'
	    ],
	    'last_name' => [
	        'title' => 'Last Name',
	        'type' => 'text'
	    ],
	],
];