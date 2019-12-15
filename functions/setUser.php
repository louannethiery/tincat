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
    if ( empty( $pseudo ) || empty( $password )) {
        echo "Merci de remplir le champ du formulaire vide";
    }
    // Ajouter un input confirm password et vérifier si les deux sont égaux
    if ($_POST['password'] != $_POST['password2']) {
        echo 'Les mots de passe doivent être identiques';
    } 

// Ajouter un champ email

// Etape 3: prepare request
$req = $db->prepare("INSERT INTO users (pseudo, email, password, password2) VALUES(:pseudo, :email, :password, :password2)");
$req->bindParam(":pseudo", $_POST["pseudo"]);;
$req->bindParam(":email", $_POST["email"]);
$req->bindParam(":password", $_POST["password"]);
$req->bindParam(":password2", $_POST["password2"]);
$req->execute();