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
        <h2> Sign Up</h2>
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
            <input type="submit" name = "Sign Up" value="Sign Up" class = "input submit">
        </form>
        <p>Already have a login?</p>
        <a href = "login.php">Login</a>
    </div>
</body>
</html>
<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $exist = mysqli_query($conn,"SELECT username FROM user_table WHERE username='{$username}';");
        if(mysqli_num_rows($exist)==0){
            mysqli_query($conn,"INSERT INTO user_table (username) VALUES ('{$username}');");
            $query = "CREATE TABLE {$username} (
                password VARCHAR(255),
                element VARCHAR(50),
                symbol VARCHAR(10),
                atomic_number INT(30),
                mass FLOAT(53)
            );";
            mysqli_query($conn,$query);
            $query = "INSERT INTO {$username} (password) VALUES('{$password}');";
            mysqli_query($conn,$query);
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["id"] = $id;
            header("Location: login.php");
        }
    }
?> 