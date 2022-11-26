<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM bank";

    $result = $mysqli->query($sql);

    // $user = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/holiday.css@0.9.8" /> -->
</head>
<body>

    <?php if(isset($result)): ?>

    <table border = '1px'>
    <?php
        while($row = $result->fetch_array())
        {
            $bid = $row[0];
            $name = $row[1];

            echo "<tr>";
            echo "<td> {$bid} </td>";
            echo "<td> {$name} </td>";
            echo "</tr>";
        }
    ?>
        
    </table>

    <h1>Enter Loan Details:</h1>

    <form action = "process-loan.php" method = "post">
        <div>
            <label for = "amount">Amount</label>
            <input type = "text" id = "amount" name = "amount">
        </div>

        <div>
            <label for = "interest">Interest</label>
            <input type = "text" id = "interest" name = "interest">
        </div>

        <div>
            <label for = "months">Months between payments</label>
            <input type = "text" id = "months" name = "months">
        </div>

        <div>
            <label for = "bid">Bank ID</label>
            <input type = "text" id = "bid" name = "bid">
        </div>
        
        <button>Add</button>

    </form>
    <?php endif; ?>
</body>
</html>