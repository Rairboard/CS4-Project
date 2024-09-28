<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Periodic Table</title>
    <link href="crappy3.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="back-button">
        <a href="create.php">
            <button>Back to Create</button>
        </a>
    </div>
    <center>
        <h1 class="heading">Periodic Table</h1>
    </center>
    <br><br>
    <table>
        <?php 
            create_table();
        ?>
    </table>
</body>
</html>

<?php
function create_table(){
    $conn = mysqli_connect('localhost', 'root', 'abc', 'periodic table');
    $result = mysqli_query($conn, "SELECT atomic_number, symbol, element, mass FROM {$_SESSION["username"]} WHERE atomic_number IS NOT NULL AND symbol IS NOT NULL AND element IS NOT NULL AND mass IS NOT NULL");
    while($row = mysqli_fetch_assoc($result)){
       echo "<th>
            <td>
            {$row['mass']}
            <br>
            {$row['symbol']}
            <br>
            {$row['element']}
            <br>
            {$row['atomic_number']}
            </td>
       </th>";
    }
}
?>


