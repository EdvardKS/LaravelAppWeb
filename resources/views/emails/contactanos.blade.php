<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
    <h3>De: {{ $data['nombre'] }}, {{ $data['email'] }}</h3>
    <br>
    <h4>Cuerpo del mensaje:</h4>
    <p>{{ $mensaje }}</p>
</body>
</html>
