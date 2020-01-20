<!-- 1. Transmettre l'id de la page profils.php à la page deleteUser.php
 -Connect to database
 -Prepare (DELETE SQL)
 -Execute

2. Rediriger vers profils.php -->


<?php
require("database.php");

$req = $db->prepare("DELETE FROM users WHERE id = :id");
$req->bindParam(":id" , $_GET["user_id"]);
$req->execute();

header("Location: ../profils.php");

var_dump($_GET["id"] );

