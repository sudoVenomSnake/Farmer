<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM loan
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

    <h1>Loan Details</h1>

    <?php if(isset($result)): ?>

        <p>Loan ID|Amount|Interest|Months</p>

        <table border = '1px'>
        <?php
            while($row = $result->fetch_array())
            {
                $amount = $row[0];
                $interest = $row[1];
                $months = $row[2];
                $bid = $row[3];

                echo "<tr>";
                echo "<td> {$amount} </td>";
                echo "<td> {$interest} </td>";
                echo "<td> {$months} </td>";
                echo "<td> {$bid} </td>";
                echo "</tr>";
            }
        ?>
            
        </table>

        <p><a href = "loanform.php">Add another loan.</a></p>

        <p><a href = "deleteloan.html">Delete a loan.</a></p>

        <p><a href = "updateloan.html">Update a loan.</a></p>

        <p><a href = "index.php">Back to home.</a></p>

        <p><a href = "logout.php">Log out.</a></p>

    <?php else: ?>
        <p><a href = "loanform.php">Please enter loan details :D</a></p>

    <?php endif; ?>

</body>
</html>