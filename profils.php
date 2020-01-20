<?php
    require("head.php");

    if( empty($_SESSION) ){
        header("Location: login.php");
    }
    echo "Bonjour " . $_SESSION["pseudo"];
?>

<!-- ************************ -->
<!-- Afficher les utilisateurs stockés dans la BDD sauf moi -->
<!-- ************************ -->

<?php
//1 : connect to database
require("functions/database.php");
//2 : prepare request (SELECT)
$req = $db->prepare("SELECT id, pseudo FROM users WHERE pseudo <> :pseudo");
$req->bindParam(":pseudo", $_SESSION["pseudo"]);
//3 : execute request
$req->execute();
//4 : boucle pour afficher tous les utilisateurs
while($result = $req->fetch(PDO::FETCH_ASSOC)){
    //var_dump($result["pseudo"]);
    ?>
    <div class="users">
         <div>
                <strong><?php echo $result["pseudo"] ?></strong>
                <button><a href="functions/deleteUser.php?user_id=<?php echo $result["id"]?>">Supprimer</a></button>
                <button><a href="userEditForm.php?user_id=<?php echo $result["id"]?>">Modifier</button>
            </div>
        <?php
    }
    ?>
    </div>

<a href="functions/disconnect.php">Se déconnecter</a>