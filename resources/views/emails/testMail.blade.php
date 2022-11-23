<!DOCTYPE html>
<html>
<head>
    <title>Wellcome a DJump</title>
</head>
<body>
    <h1>{{ $testMailData['title'] }}</h1>
    <p>{{ $testMailData['body'] }} +</p>
    <p>Estos son los datos del usuario:</p>
    <ul>
        <li>Nombre: {{ $testMailData['user']->name }}</li>
        <li>Email: {{ $testMailData['user']->email }}</li>
    </ul>
    <p>Recuerde completar los datos en la seccion de Setting</p>
</body>
</html>