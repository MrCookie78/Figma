<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande Acceptée</title>
</head>
<body>
    <h1>Demande de création de compte acceptée</h1>

    <p>Bonjour, {{$firstname}} {{$lastname}}, votre demande de compte a été acceptée.</p>
    <p>Vos identifiants sont :</p>
    <p>{{$email}}</p>
    <p>{{$password}}</p>

    <p><a href="http://127.0.0.1:8000/login">Vous connecter</a></p>
</body>
</html>
