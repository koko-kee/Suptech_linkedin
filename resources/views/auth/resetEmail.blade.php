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
    <pre>
        Cher utilisateur,
            Vous auriez récemment demandé à changer votre mot de passe.
            Pour se faire, veuillez simplement cliquer sur le lien ci-dessous :

            <a class="reset-link" href="{{ route('checkToken', ['token' => $token]) }}">Réinitialiser le mot de passe</a>
        
        Si vous n'avez pas demandé cette réinitialisation, vous pouvez ignorer cet e-mail en toute sécurité.

                                                                                                Cordialement.
    </pre>
<!--
    inserer le logo
!-->    
</body>
</html>
