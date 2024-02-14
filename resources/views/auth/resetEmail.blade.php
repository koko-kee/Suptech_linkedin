<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe</title>
    <style>
        .container {
            text-align: center;
        }
        .image {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Réinitialisation de mot de passe</h1>
    <p>
        Vous avez demandé la réinitialisation de votre mot de passe. 
        Veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe :
    </p>
    <p>
        <a href="{{ $resetUrl }}">Réinitialiser votre mot de passe</a>
    </p>
    <p>
        Si vous n'avez pas demandé cette réinitialisation, vous pouvez ignorer cet e-mail en toute sécurité.
    </p>

    <div class="container">
        <img src="{{ asset('images/logos/logo.png') }}" alt="logo" class="image">
    </div>
</body>
</html>
