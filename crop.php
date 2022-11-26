<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM crop
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    // $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmophile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/holiday.css@0.9.8" />
</head>
<body>

    <h1>Crop Details</h1>

    <?php if(isset($result)): ?>

        <p>Harvest Month|Crop Name|Quantity|Crop ID</p>

        <table border = '1px'>
        <?php
            while($row = $result->fetch_array())
            {
                $harvest_month = $row[0];
                $name = $row[1];
                $quantity = $row[2];
                $cid = $row[3];

                echo "<tr>";
                echo "<td> {$harvest_month} </td>";
                echo "<td> {$name} </td>";
                echo "<td> {$quantity} </td>";
                echo "<td> {$cid} </td>";
                echo "</tr>";
            }
        ?>
            
        </table>

        <p><a href = "cropform.html">Add another crop.</a></p>

        <p><a href = "deletecrop.html">Delete a crop.</a></p>

        <p><a href = "updatecrop.html">Update a crop.</a></p>

        <p><a href = "index.php">Back to home.</a></p>

        <p><a href = "logout.php">Log out.</a></p>

    <?php else: ?>
        <p><a href = "cropform.html">Please enter crop details :D</a></p>

    <?php endif; ?>

</body>
</html>