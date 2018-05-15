<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login | Orçamentos | Prefeitura de Rio Negrinho</title>
	<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>
<body>

	<div class="background"></div>

	<section id="content-view" class="login">

		<h1>Orçamentos</h1>
		<h3>Prefeitura de Rio Negrinho</h3>

		{!! Form::open(['route' => 'company.login', 'method' => 'post']) !!}

		<p>Acessar o Sistema:</p>

		<label>
			{!! Form::text('username', null, ['class' => 'input', 'placeholder' => "E-mail"]) !!}
		</label>

		<label>
			{!! Form::password('password', ['placeholder' => "Senha"]) !!}
		</label>

		{!! Form::submit('Conectar') !!}

		{!! Form::close() !!}

	</section>

</body>
</html>