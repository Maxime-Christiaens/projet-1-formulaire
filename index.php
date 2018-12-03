<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formu For Hackers Poulettes</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="row">
    <img class="col s4 push-s4 pull-s4" src="imgs/hackers-poulette-logo.png" alt="Logo de hackers poulette">
        <form action="" class="col s8 offset-s2">
            <div class="row">
                <div class="input-field col s3 push-s2">
                    <input name="prenom" id="prenom" type="text" class="validate">
                    <label for="prenom">Prenom</label>
                </div>
                <div class="input-field col s3 push-s4">
                    <input name="nom" id="nom" type="text" class="validate">
                    <label for="nom">Nom</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <input type="email" id="email">
                    <label for="email">E-mail</label>
                </div>
            </div>
        </form>
    </div>
</body>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>