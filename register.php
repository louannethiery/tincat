<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/setUser.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="password">
            <input type="email" placeholder="email" name="email" required><br>
            <input type="submit" value="register">
            
        </form>
    </div>
</body>
</html>