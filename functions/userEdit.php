<?php

//1 : connect to database
require("database.php");

        $id = $_POST['user_id'];
        $pseudo = $_POST['pseudo'];
        $messageProfilEdit = "Pseudo modifié avec succès";


        $req = $db->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
        $req->execute([$pseudo, $id]);
        header("Location: ../profils.php?messageUpdate=$messageProfilEdit");

?>