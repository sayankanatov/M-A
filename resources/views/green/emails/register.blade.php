<!DOCTYPE html>
<html>
<head>
	<title>Новая регистрация!</title>
</head>
<body>
	<h2>Пользователь {!! $user->name!!}</h2>
	<p>Зарегистрировался на сайте!</p>
	<p>Его данные:</p>
	<p>email: {!!$user->email!!}</p>
	<p>login: {!!$user->name!!}</p>
</body>
</html>