<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <hr>
    <div class="outer">
        <h2> Login Page </h2>
        <br>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post" >
            <div class="input">
                <label>Enter your username:</label><br>
                <input type="text" name ="username" placeholder="Username" required></input>
            </div>
            <div class="input">
                <label>Enter your password:</label><br>
                <input type="password" name = "password" placeholder="Password" required></input>
            </div>
            <br>
            <input type="submit" name = "Login" value="Login" class = "input submit">
        </form><br>
    </div>
</body>
</html>
 <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: create.php");
    }
?>