<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Le compte de l'entreprise {{$entreprise->email}} a ete activer avec succes</h1>
    <a href="{{route('login')}}">Cliquez sur ce lien pour vous connectez</a>
</body>
</html>