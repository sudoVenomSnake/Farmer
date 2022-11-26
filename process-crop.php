<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO crop(harvest_month, name, quantity, id)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

$stmt->bind_param("sssi",
                $_POST["harvest_month"],
                $_POST["name"],
                $_POST["quantity"],
                $_SESSION["user_id"]);

if($stmt->execute())
{
    header("Location: crop.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}