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

echo($_SESSION["sexe"]);

////////////
//Filtrage//
////////////

//isset si variable existe renvoie true
if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["choix"]) && isset($_POST["country"]) && isset($_POST["sexe"]) && isset($_POST["message"])) { //condition vérifiant si tout à été rempli

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

    /* foreach ($result as $key => $value) {
        echo ("$key = " . $result[$key] . " <br>");
    } */
    //affiche les valeurs de tout les inputs du formulaires

}

?>
<a href="../index.php">
    Retour
</a>
