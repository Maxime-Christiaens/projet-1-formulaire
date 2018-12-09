<!DOCTYPE html>
<html lang="fr">
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
        <form action="php/formu.php" method="POST" class="col s10 offset-s1">
            <div class="row">
            </div>
            <div class="row">
                <div class="input-field col s3 push-s2">
                    <input value="<?php session_start(); if(isset($_SESSION["prenom"])){echo($_SESSION["prenom"]);} ?>" name="prenom" id="prenom" type="text" class="validate">
                    <label for="prenom">Prenom</label>
                    <p class="redy"><?php if(isset($_SESSION["ErrorPrenom"])){echo($_SESSION["ErrorPrenom"]);} ?></p>
                </div>
                <div class="input-field col s3 push-s4">
                    <input value="<?php if(isset($_SESSION["nom"])){echo($_SESSION["nom"]);} ?>" name="nom" id="nom" type="text" class="validate">
                    <label for="nom">Nom</label>
                    <p class="redy"><?php if(isset($_SESSION["ErrorNom"])){echo($_SESSION["ErrorNom"]);} ?></p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <input value="<?php if(isset($_SESSION["email"])){echo($_SESSION["email"]);} ?>" name="email" type="email" id="email" class="validate">
                    <label for="email">E-mail</label>
                    <p class="redy"><?php if(isset($_SESSION["ErrorEmail"])){echo($_SESSION["ErrorEmail"]);} ?></p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 push-s2">
                    <select multiple value="<?php if(isset($_SESSION["choix"])){echo($_SESSION["choix"]);} ?>" name="choix[]" id="choix">
                        <optgroup label="Quelle est ton choix ?">
                            <option value="Option 1" <?php 
                            if(isset($_SESSION["choix"])){
                                foreach ($_SESSION["choix"] as $value){ //permet de remettre le choix en séléctionné s'il a été précédemmment séléctionné
                                    if($value == "Option 1"){
                                        echo("selected");}
                                }
                            } ?> 
                            >Option 1</option>
                            <option <?php 
                            if(isset($_SESSION["choix"])){
                                foreach ($_SESSION["choix"] as $value){ //permet de remettre le choix en séléctionné s'il a été précédemmment séléctionné
                                    if($value == "Option 2"){
                                        echo("selected");}
                                }
                            } ?> value="Option 2">Option 2</option>
                            <option <?php 
                            if(isset($_SESSION["choix"])){
                                foreach ($_SESSION["choix"] as $value){ //permet de remettre le choix en séléctionné s'il a été précédemmment séléctionné
                                    if($value == "Option 3"){
                                        echo("selected");}
                                }
                            } ?> value="Option 3">Option 3</option>
                            <option <?php 
                            if(isset($_SESSION["choix"])){
                                foreach ($_SESSION["choix"] as $value){ //permet de remettre le choix en séléctionné s'il a été précédemmment séléctionné
                                    if($value == "Option 4"){
                                        echo("selected");}
                                }
                            } ?> value="Option 4">Option 4</option>
                            <option <?php 
                            if(isset($_SESSION["choix"])){
                                foreach ($_SESSION["choix"] as $value){ //permet de remettre le choix en séléctionné s'il a été précédemmment séléctionné
                                    if($value == "Option 5"){
                                        echo("selected");}
                                }
                            } ?> value="Option 5">Option 5</option>
                        </optgroup>
                    </select>
                    <label for="choix">Quel est ton choix ?</label>
                </div>
                <div class="input-field col s2 push-s3">
                    <input value="<?php if(isset($_SESSION["country"])){echo($_SESSION["country"]);} ?>" name="country" id="country" type="text" class="validate">
                    <label for="country">Pays</label>
                    <p class="redy"><?php if(isset($_SESSION["ErrorCountry"])){echo($_SESSION["ErrorCountry"]);} ?></p>
                </div>
                <div class="input-field col s2 push-s4">
                    <select value="<?php if(isset($_SESSION["sexe"])){echo($_SESSION["sexe"]);} ?>" name="sexe" id="sexe">
                        <optgroup label="Quelle est ton genre ?">
                            <option value="Homme">Masculin</option>
                            <option value="Femme" 
                            <?php 
                            if(isset($_SESSION["sexe"])){
                                if ($_SESSION["sexe"] == "Femme"){
                                    echo("selected");
                                }
                            }
                            ?> >Féminin</option>
                        </optgroup>
                    </select>
                    <label for="sexe">Genre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <textarea value="Bonsoir" class="materialize-textarea" name="message" id="message"><?php if(isset($_SESSION["message"])){echo($_SESSION["message"]);} ?></textarea>
                    <label for="message">Un message à nous transmettre ?</label>
                    <p class="redy"><?php if(isset($_SESSION["ErrorMessage"])){echo($_SESSION["ErrorMessage"]);} ?></p>
                </div>
            </div>
            <div class="row">
                <button class=" col s2 push-s5 waves-effect waves-light btn" type="submit"> 
                    Envoyer
                </button>
                <!--HoneyPot-->
                <input type="checkbox" name="send" value="1" style="display:none !important" autocomplete="off">
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


