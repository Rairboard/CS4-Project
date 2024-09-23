<?php
    session_start();
    $conn = mysqli_connect('localhost','root','abc','periodic table');
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $result = mysqli_query($conn,"SELECT username FROM user_table WHERE username='{$username}';");
    if(mysqli_num_rows($result) == 0){
        mysqli_query($conn, "INSERT INTO user_table (username,password) VALUES('{$username}','{$password}');"); 
    }
    else{
        $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_table WHERE username='{$username}'"));
        // echo $row["password"]. "<br>";
        // echo $_SESSION["password"];
        if(strcmp($row["password"],$password) != 0){
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Periodic Table</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <div class="outer">
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <div class="input">
                <label>Name:</label><br>
                <input type = "text" name = "name" placeholder="Name" required>
            </div>
            <div class="input">
                <label>Mass:</label><br>
                <input type ="text" name = "mass" placeholder="Mass" required>
            </div>
            <div class="input">
                <label>Symbol:</label><br>
                <input type = "text" name = "symbol" placeholder="Symbol" required> 
            </div>
            <br>
            <input class = "input submit" type = "submit" name ="Add" value = "Add"><br>
        </form><br>
    </div>
    <br>
    <center class = "TableButton">
        <a href = "table.php"><button>See Table</button></a>
    </center>

</body>
</html>
<?php
    $result = mysqli_query($conn,"SELECT * FROM user_table WHERE username='{$username}';");
    $user = mysqli_fetch_assoc($result);
    $user_id = $user["id"];
    if($_SERVER["REQUEST_METHOD"] = "POST"){
        if(!empty($_POST["name"]) && !empty($_POST["mass"]) && !empty($_POST["symbol"])){
            $element_name = $_POST["name"];
            $mass = $_POST["mass"];
            $symbol = $_POST["symbol"];
            $query= mysqli_query($conn, "SELECT * FROM element WHERE user_id = {$user_id};");
            $atomic_number = mysqli_num_rows($query)+1;
            mysqli_query($conn, "INSERT INTO element (atomic_number,name, mass, symbol, user_id) VALUES ({$atomic_number},'{$element_name}',{$mass},'{$symbol}',{$user_id});");
            $_SESSION["name"] = $element_name;
            $_SESSION["mass"] = $mass;
            $_SESSION["symbol"] = $symbol;
            $_SESSION["atomic number"] = $atomic_number;
            $_SESSION["user id"] = $user_id;
        }
    }
?>
