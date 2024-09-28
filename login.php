<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="crappy.css">
</head>
<body>
    <hr>
    <div class="outer">
        <h2> Login Page </h2>
        <br>
        <form action="" method="post" >
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
        </form>
        <p>Don't have a login?</p>
        <a href = "index.php">Sign up</a>
    </div>
</body>
</html>
 <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $exist = mysqli_query($conn,"SELECT username FROM user_table WHERE username='{$username}';");
        echo mysqli_num_rows($exist);
        if(mysqli_num_rows($exist)>0){
            $query = "SELECT password FROM {$_POST["username"]} WHERE password IS NOT NULL;";
            $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
            $hash_password = $result["password"];
            $password = $_POST["password"];
            $_SESSION["username"] = $_POST["username"];
            if(password_verify($password,$hash_password)){
                header("Location: create.php");
            }
        }
    }
?>