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
<?php
//////////////////////////
//Créations des sessions//
//////////////////////////
session_start();
$_SESSION["prenom"] = $_POST["prenom"];
$_SESSION["nom"] = $_POST["nom"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["choix"] = $_POST["choix"];
$_SESSION["sexe"] = $_POST["sexe"];
$_SESSION["country"] = $_POST["country"];
$_SESSION["message"] = $_POST["message"];

//////////////////
//Filtrage Choix//
//////////////////
$AllChoice = ["Option 1", "Option 2", "Option 3", "Option 4", "Option 5"];
//stock tout les variables existantes
$k = 0;
//cette double boucle *ma spécialité* vérifie si ce qui a été envoyer dans le tableau de la session choix correspond bien à une valeur existante 
foreach($_SESSION["choix"] as $value){ //génère 
    //echo($value);
    foreach($AllChoice as $option){
        //echo($option);
        if($option == $value) //si des options correspondent augmente le compteur
        {
            $k++;
            //echo("k = ".$k);
        }
    }
}
echo("k = ".$k);
echo(" Nombre d'option séléctionner = ".count($_SESSION["choix"]));
//Si la longueur du tableau correspond au nombre de valeur correct alors OK et stocke true dans une variable qui servira d'interrupteur

$choixCheck = false;

if($k == count($_SESSION["choix"])){
$choixCheck = true;
}

////////////
//Filtrage//
////////////

//Isset si variable existe renvoie true
if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["choix"]) && isset($_POST["country"]) && isset($_POST["sexe"]) && isset($_POST["message"]) && $choixCheck && ($_POST["sexe"]=="Homme" || $_POST["sexe"]=="Femme")) { //condition vérifiant si tout à été rempli

    $options = array(
        "prenom" => FILTER_SANITIZE_STRING,
        "nom" => FILTER_SANITIZE_STRING,
        "email" => FILTER_VALIDATE_EMAIL,
        "country" => FILTER_SANITIZE_STRING,
        "sexe" => FILTER_SANITIZE_STRING,
        "message" => FILTER_SANITIZE_STRING);

    $result = filter_input_array(INPUT_POST, $options);

    if ($result != null and $result != false) {
        echo "Tous les champs ont été nettoyés !<br>";
    } else {
        echo "Un champ est vide ou n'est pas correct!";
    }
    //vérifie si la désinféction a été efféctué avec succés

    foreach ($result as $key => $value) {
        echo ("$key = " . $result[$key] . " <br>");
    }
    //affiche les valeurs de tout les inputs du formulaires

/////////////////////////////////////////
////Crétation de l'html si input okay////
/////////////////////////////////////////
    ?>
        <div class="row bg-color formuDiv">
        <div class="col s4 push-s4 pull-s4">
            <img class="responsive-img" src="imgs/hackers-poulette-logo.png" alt="Logo de hackers poulette">
        </div>
        <form action="php/formu.php" method="POST" class="col s10 offset-s1">
            <div class="row">
            </div>
            <div class="row">
                <div class="input-field col s3 push-s2">
                    <input value="<?php session_start(); echo($_SESSION["prenom"]); ?>" name="prenom" id="prenom" type="text" class="validate" required="required">
                    <label for="prenom">Prenom</label>
                </div>
                <div class="input-field col s3 push-s4">
                    <input value="<?php echo($_SESSION["nom"]); ?>" name="nom" id="nom" type="text" class="validate" required="required">
                    <label for="nom">Nom</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <input value="<?php echo($_SESSION["email"]); ?>" name="email" type="email" id="email" class="validate" required="required">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 push-s2">
                    <select multiple value="<?php echo($_SESSION["choix"]); ?>" name="choix[]" id="choix">
                        <optgroup label="Quelle est ton choix ?">
                            <option value="Option 1" <?php 
                            foreach ($_SESSION["choix"] as $value){ //permet de remettre le choix en séléctionné s'il a été précédemmment séléctionné
                                if($value == "Option 1" ){
                                    echo("selected");}
                            }?> >Option 1</option>
                            <option <?php 
                            foreach ($_SESSION["choix"] as $value){
                                if($value == "Option 2" ){
                                    echo("selected");}
                            }?> value="Option 2">Option 2</option>
                            <option <?php 
                            foreach ($_SESSION["choix"] as $value){
                                if($value == "Option 3" ){
                                    echo("selected");}
                            }?> value="Option 3">Option 3</option>
                            <option <?php 
                            foreach ($_SESSION["choix"] as $value){
                                if($value == "Option 4" ){
                                    echo("selected");}
                            }?> value="Option 4">Option 4</option>
                            <option <?php 
                            foreach ($_SESSION["choix"] as $value){
                                if($value == "Option 5" ){
                                    echo("selected");}
                            }?> value="Option 5">Option 5</option>
                        </optgroup>
                    </select>
                    <label for="choix">Quel est ton choix ?</label>
                </div>
                <div class="input-field col s2 push-s3">
                    <input value="<?php echo($_SESSION["country"]); ?>" name="country" id="country" type="text" class="validate" required="required">
                    <label for="country">Pays</label>
                </div>
                <div class="input-field col s2 push-s4">
                    <select value="<?php echo($_SESSION["sexe"]); ?>" name="sexe" id="sexe">
                        <optgroup label="Quelle est ton genre ?">
                            <option value="Homme">Masculin</option>
                            <option value="Femme" 
                            <?php 
                            session_start();
                            if ($_SESSION["sexe"] == "Femme"){
                                echo("selected");
                            }
                            ?> >Féminin</option>
                        </optgroup>
                    </select>
                    <label for="sexe">Genre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <textarea value="Bonsoir" class="materialize-textarea" name="message" id="message" required="required"><?php session_start(); echo($_SESSION["message"]); ?></textarea>
                    <label for="message">Un message à nous transmettre ?</label>
                </div>
            </div>
            <div class="row">
                <button class=" col s2 push-s5 waves-effect waves-light btn" type="submit"> 
                    Valider le formulaire
                </button>
            </div>
        </form>
    </div>
    <?php
}
else{
?>
<h2>Il y a des erreurs, veuillez remplir de nouveau le questionnaire</h2>
<a href="../index.php">
    Retour
</a>
<?php
}
?>   
</body>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>




