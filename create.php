<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Periodic Table</title>
    <link rel="stylesheet" href="crappy2.css">
</head>
<body>
    <div class="outer">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="input">
                <label>Name:</label><br>
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="input">
                <label>Mass:</label><br>
                <input type="text" name="mass" placeholder="Mass" required>
            </div>
            <div class="input">
                <label>Symbol:</label><br>
                <input type="text" name="symbol" placeholder="Symbol" required>
            </div>
            <input class="submit" type="submit" name="Add" value="Add">
        </form>
        <div class="TableButton">
            <a href="table.php">
                <button>See Table</button>
            </a>
            <a href="homepage.php">
                <button>Homepage</button>
            </a>
        </div>
    </div>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["name"]) && !empty($_POST["mass"]) && !empty($_POST["symbol"])) {
            $element_name = $_POST["name"];
            $mass = $_POST["mass"];
            $symbol = $_POST["symbol"];
            $username = $_SESSION["username"];

            $atomic_number = mysqli_num_rows(mysqli_query($conn,"SELECT atomic_number from {$username} WHERE atomic_number is not null;")) + 1;
            
            echo $atomic_number;
            $query = "INSERT INTO {$username} (element, mass, symbol, atomic_number) VALUES ('{$element_name}','{$mass}','{$symbol}','{$atomic_number}');";
            mysqli_query($conn, $query);
            $_SESSION["name"] = $element_name;
            $_SESSION["mass"] = $mass;
            $_SESSION["symbol"] = $symbol;
            $_SESSION["atomic number"] = $atomic_number;
        }
    }
?>


