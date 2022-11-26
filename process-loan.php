<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO loan(amount, interest, months, bid, id)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

$stmt->bind_param("sssss",
                $_POST["amount"],
                $_POST["interest"],
                $_POST["months"],
                $_POST["bid"],
                $_SESSION["user_id"]);

if($stmt->execute())
{
    header("Location: loan.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}