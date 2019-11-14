<?php

return [
	'roles' => [
		'individual' => 1,
		'entity' => 2,
		'company' => 3,
	],

	'worktime' => [
		'1' => 'пн - пт',
		'2' => 'пн - cб',
		'3' => 'без выходных',
	],
	'time' => [
		'1' => '09:00 - 18:00',
		'2' => '10:00 - 19:00',
		'3' => 'Круглосуточное время работы'
	],

	'langs' => [
		'1' => 'Казахский',
		'2' => 'Русский',
		'3' => 'Английский',
		'4' => 'Казахский и русский',
	],
	'work_for' => [
		'1' => 'физических лиц',
		'2' => 'юридических лиц',
		'3' => 'оба варианта',
	],
	'is_free' => [
		'1' => 'Да',
		'0' => 'Нет'
	],
	'is_member' => [
		'1' => 'Да',
		'0' => 'Нет'
	],
	'city' => 1,

	'pagination' => [
		'lawyers' => 10,
		'services' => 10,
		'companies' => 10,
	],
];