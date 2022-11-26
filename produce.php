<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM produce
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/holiday.css@0.9.8" /> -->
</head>
<body>

    <h1>Crop Details</h1>

    <?php if(isset($result)): ?>

        <table border = '1px'>
        <?php
            while($row = $result->fetch_array())
            {
                $pid = $row[0];
                $year = $row[1];
                $revenue = $row[2];

                echo "<tr>";
                echo "<td> {$pid} </td>";
                echo "<td> {$year} </td>";
                echo "<td> {$revenue} </td>";
                echo "</tr>";
            }
        ?>
            
        </table>

        <p><a href = "produceform.html">Add a record.</a></p>

        <p><a href = "deleteproduce.html">Delete a record.</a></p>

        <p><a href = "updateproduce.html">Update a record.</a></p>

        <p><a href = "index.php">Back to home.</a></p>

        <p><a href = "logout.php">Log out.</a></p>

    <?php else: ?>
        <p><a href = "produceform.html">Please enter crop details :D</a></p>

    <?php endif; ?>

</body>
</html>