<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO produce(year, revenue, id)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

$stmt->bind_param("ssi",
                $_POST["year"],
                $_POST["revenue"],
                $_SESSION["user_id"]);

if($stmt->execute())
{
    header("Location: produce.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}