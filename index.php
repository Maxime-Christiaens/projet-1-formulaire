<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formu For Hackers Poulettes</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
</head>
<body>
    <div class="row bg-color formuDiv">
        <div class="col s4 push-s4 pull-s4">
            <img class="responsive-img" src="imgs/hackers-poulette-logo.png" alt="Logo de hackers poulette">
        </div>
        <form action="index.php" method="POST" class="col s10 offset-s1">
            <div class="row">
            </div>
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
                    <input type="email" id="email" class="validate">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 push-s2">
                    <select name="choix" id="choix">
                        <optgroup label="Quelle est ton choix ?">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 2</option>
                        </optgroup>
                    </select>
                    <label for="choix">Quel est ton choix ?</label>
                </div>
                <div class="input-field col s2 push-s3">
                    <input name="country" id="country" type="text" class="validate">
                    <label for="country">Pays</label>
                </div>
                <div class="input-field col s2 push-s4">
                    <select name="sexe" id="sexe">
                        <optgroup label="Quelle est ton genre ?">
                            <option value="Homme">Masculin</option>
                            <option value="Femme">Féminin</option>
                        </optgroup>
                    </select>
                    <label for="sexe">Genre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <textarea class="materialize-textarea" name="message" id="message" ></textarea>
                    <label for="message">Un message à nous transmettre ?</label>
                </div>
            </div>
            <div class="row">
                <button class=" col s2 push-s5 waves-effect waves-light btn" type="submit">Envoyez le formulaire</button>
            </div>
        </form>
    </div>
</body>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/formu.js"></script>
</html>


