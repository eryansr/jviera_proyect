<!DOCTYPE html>
<html>
<head>
	<title>Mensaje Recibido</title>
</head>
<body>

	<p>Haz recibido un mensaje de: {{ $msg['nombre'] }} - {{ $msg['correo'] }}</p>
	<p><strong>Telefono: </strong> {{ $msg['telefono'] }}</p>
	<p><strong>Empresa: </strong> {{ $msg['empresa'] }}</p>
	<p><strong>Asunto: </strong> {{ $msg['mensaje'] }}</p>

</body>
</html>

