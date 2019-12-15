<?php
// Etape 1: Confog database 
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "root";

// Etape 2: Connexion to database

try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    if ( empty( $pseudo ) || empty( $password ) || empty( $email )) {
        echo "Merci de remplir le champ du formulaire vide";
    }
    // Ajouter un input confirm password et vérifier si les deux sont égaux

// Ajouter un champ email

// Etape 3: prepare request
$req = $db->prepare("INSERT INTO users (pseudo, password, email) VALUES(:pseudo, :password, :email)");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);
$req->bindParam(":email", $_POST["email"]);
$req->execute();