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
}

?>
<a href="../index.php">
    Retour
</a>

