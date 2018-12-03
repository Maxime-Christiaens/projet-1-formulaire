<?php 

//isset si variable existe renvoie true 
if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["choix"]) && isset($_POST["country"]) && isset($_POST["sexe"]) && isset($_POST["message"])){ //condition vérifiant si tout à été rempli

    $options = array(
        'prenom' 	=> FILTER_SANITIZE_STRING,
        'nom' 	=> FILTER_SANITIZE_STRING,
        'email' 		=> FILTER_VALIDATE_EMAIL,
        'country' 		=> FILTER_SANITIZE_STRING,
        'sexe' 		=> FILTER_SANITIZE_STRING,
        'message' 		=> FILTER_SANITIZE_STRING);

    $result = filter_input_array(INPUT_POST, $options);

    if ($result != null AND $result != FALSE) {
        echo "Tous les champs ont été nettoyés !<br>";
    } else {
        echo "Un champ est vide ou n'est pas correct!";
    }  
    //vérifie si la désinféction a été efféctué avec succés

    foreach ($result as $key => $value){
        echo("$key = ".$result[$key]." <br>");
    }
    //affiche les valeurs de tout les inputs du formulaires
    
}











































?>