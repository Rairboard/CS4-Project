<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Periodic Table</title>
    <link href="table.css" rel="stylesheet" type="text/css">
</head>
<body>
    <br>
    <center>
        <h class="heading">Periodic Table</h>
    </center>
    <br><br>
    <table>
        <?php 
            create_table($user_id = $_SESSION['user id']);
        ?>
    </table>
</body>
</html>
<?php
function create_table($user_id){
    $con = mysqli_connect('localhost','root','abc','periodic table');
    $user_id = $_SESSION["user id"];
    $result = mysqli_query($con, "SELECT * FROM element WHERE user_id = {$user_id}");
    while($row = mysqli_fetch_assoc($result)){
       echo "<th>
            <td>{$row['atomic_number']}<br>{$row['symbol']}<br>{$row['name']}</td>
       </th>";
    }
}
?>