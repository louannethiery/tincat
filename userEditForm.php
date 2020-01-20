 <?php 
 require ("head.php");
 require("functions/database.php");

if(empty($_SESSION["pseudo"])){
        header("Location: login.php");
    }
    
    $req = $db->prepare("SELECT pseudo FROM users WHERE id = :id");
    $req->bindParam(":id" , $_GET["user_id"]);
    $req->execute();

    $result = $req->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <div class="form-edit">
        <h1>TINCAT</h1>
        <form action="functions/userEdit.php" method="post">
            <label>Pseudo :</label>
            <input type="text" placeholder="Nouveau pseudo" name="pseudo" value="<?php echo $result['pseudo']; ?>">
            <input type="hidden" placeholder="id" name="user_id" value="<?php echo $_GET['user_id']; ?>">
            <input type="submit" placeholder="Modifier" value="Modifier">
        </form>
    </div>
</body>

