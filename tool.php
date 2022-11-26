<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM tools
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

    <h1>Tool Details</h1>

    <?php if(isset($result)): ?>

        <table border = '1px'>
        <?php
            while($row = $result->fetch_array())
            {
                $name = $row[0];
                $quantity = $row[1];
                $dob = $row[2];
                $scm = $row[3];
                $tid = $row[4];

                echo "<tr>";
                echo "<td> {$name} </td>";
                echo "<td> {$quantity} </td>";
                echo "<td> {$dob} </td>";
                echo "<td> {$scm} </td>";
                echo "<td> {$tid} </td>";
                echo "</tr>";
            }
        ?>
            
        </table>

        <p><a href = "toolform.html">Add another tool.</a></p>

        <p><a href = "deletetool.html">Delete a tool.</a></p>

        <p><a href = "updatetool.html">Update a tool.</a></p>

        <p><a href = "index.php">Back to home.</a></p>

        <p><a href = "logout.php">Log out.</a></p>

    <?php else: ?>
        <p><a href = "toolform.html">Please enter tool details :D</a></p>

    <?php endif; ?>

</body>
</html>