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
$_SESSION["sexe"] = $_POST["sexe"];
$_SESSION["country"] = $_POST["country"];
$_SESSION["message"] = $_POST["message"];
//si $choix est vide mets l'option 1 par défaut
if(empty($_POST["choix"])){
    $_POST["choix"] = ["Option 1"];
}
$_SESSION["choix"] = $_POST["choix"];

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
//Si la longueur du tableau correspond au nombre de valeur correct alors OK et stocke true dans une variable qui servira d'interrupteur

$choixCheck = false;

if($k == count($_SESSION["choix"])){
$choixCheck = true;
}

//////////////////////
///Message d'erreurs//
//////////////////////

    if (empty($_POST["prenom"])){
        $_SESSION["ErrorPrenom"] = "Veuillez écrire votre prénom";
    }
    else{
        $_SESSION["ErrorPrenom"] = "";
    }
    if (empty($_POST["nom"])){
        $_SESSION["ErrorNom"] = "Veuillez écrire votre nom";
    }
    else{
        $_SESSION["ErrorNom"] = "";
    }
    if (empty($_POST["email"])){
        $_SESSION["ErrorEmail"] = "Veuillez écrire votre Email";
    }
    else{
        $_SESSION["ErrorEmail"] = "";
    }
    if (empty($_POST["country"])){
        $_SESSION["ErrorCountry"] = "Veuillez écrire votre Pays";
    }
    else{
        $_SESSION["ErrorCountry"] = "";
    }
    if (empty($_POST["message"])){
        $_SESSION["ErrorMessage"] = "Veuillez écrire votre Message";
    }
    else{
        $_SESSION["ErrorMessage"] = "";
    }

////////////
//Filtrage//
////////////

//Isset si variable existe renvoie true
if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["choix"]) && !empty($_POST["country"]) && !empty($_POST["sexe"]) && !empty($_POST["message"]) && $choixCheck && ($_POST["sexe"]=="Homme" || $_POST["sexe"]=="Femme") && empty($_REQUEST['send'])) { //condition vérifiant si tout à été rempli

    $options = array(
        "prenom" => FILTER_SANITIZE_STRING,
        "nom" => FILTER_SANITIZE_STRING,
        "email" => FILTER_VALIDATE_EMAIL,
        "country" => FILTER_SANITIZE_STRING,
        "sexe" => FILTER_SANITIZE_STRING,
        "message" => FILTER_SANITIZE_STRING);

    $result = filter_input_array(INPUT_POST, $options);

/*     if ($result != null and $result != false) {
        echo "Tous les champs ont été nettoyés !<br>";
    } else {
        echo "Un champ est vide ou n'est pas correct!";
    } 
    //vérifie si la désinféction a été efféctué avec succés

/*     foreach ($result as $key => $value) {
        echo ("$key = " . $result[$key] . " <br>");
    } */
    //affiche les valeurs de tout les inputs du formulaires

/////////////////////////////////////////
////Crétation de l'html si input okay////
/////////////////////////////////////////
    ?>
        <div class="row bg-color formuDiv">
        <div class="col s4 push-s4 pull-s4">
            <img class="responsive-img" src="../imgs/hackers-poulette-logo.png" alt="Logo de hackers poulette">
        </div>
        <div class="row">
            </div>
            <div class="row">
                <div class="input-field col s3 push-s3">
                    <h6><?php echo("Votre prenom : ".$result["prenom"]); ?></h6>
                </div>
                <div class="input-field col s3 push-s4">
                <h6><?php echo("Votre nom : ".$result["nom"]); ?></h6>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s3">
                <h6><?php echo("Votre email : ".$result["email"]); ?></h6>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8 push-s3">
                    <h6><?php echo("Vos options : "); foreach($_SESSION["choix"] as $value){echo($value." ");} ?></h6>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 push-s3">
                    <h6><?php echo("Votre pays : ".$result["country"]); ?></h6>
                </div>
                <div class="input-field col s3 push-s4">
                    <h6><?php echo("Votre genre : ".$result["sexe"]); ?></h6>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 push-s3">
                    <h6><?php echo("Votre message : ".$result["message"]); ?></h6>
                </div>
            </div>
            <div class="row">
                <a href="../" class=" col s2 push-s3 waves-effect waves-light btn red lighten-2"> 
                    Modifier le formulaire
                </a>
                <a href="thx.php" class=" col s2 push-s5 waves-effect waves-light btn" > 
                    Valider le formulaire
                </a>
            </div>
        </div>

    <?php
}     ///////////////////////////
else{ //Deuxième page si erreur//
      ///////////////////////////  
?>
<div class="row">
    <div class="col s10 push-s1">
        <div class="col s4 push-s4 pull-s4">
            <img class="responsive-img" src="../imgs/hackers-poulette-logo.png" alt="Logo de hackers poulette">
        </div>
    </div>
</div>

<div class="row">
    <div class="col s6 push-s3">
        <h5>Il y a des erreurs, veuillez remplir de nouveau le questionnaire</h5>
        <a href="../" class="col s6 push-s3 waves-effect waves-light btn red lighten-2"> 
            Modifier le formulaire
        </a>
    </div>
</div>

<?php
}
?>   
</body>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../js/formu.js"></script>
</html>