<?php
    require("head.php");

    if( empty($_SESSION) ){
        header("Location: login.php");
    }
?>

<a href="functions/disconnect.php">Disconnect</a>

<!-- ************************ -->
<!-- Afficher les utilisateurs stockés dans la BDD sauf moi -->
<!-- ************************ -->

<?php

//1 : connect to database
require("functions/database.php");
//2 : prepare request (SELECT)
$req = $db->prepare("SELECT pseudo FROM users WHERE pseudo <> :pseudo");
$req->bindParam(":pseudo", $_SESSION["pseudo"]);
//3 : execute request
$req->execute();
//4 : boucle pour afficher tous les utilisateurs
while($result = $req->fetch(PDO::FETCH_ASSOC)){
    //var_dump($result["pseudo"]);
    if( $_SESSION ["pseudo"] != $result["pseudo"]){
        echo "<h2>" . $result["pseudo"] . "</h2>";
    }
}

echo "Bonjour" . $_SESSION["pseudo"];