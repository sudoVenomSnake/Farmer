<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO tools(name, quantity, date_of_buying, scheduled_maintenance, id)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

$stmt->bind_param("sssss",
                $_POST["name"],
                $_POST["quantity"],
                $_POST["dob"],
                $_POST["scm"],
                $_SESSION["user_id"]);

if($stmt->execute())
{
    header("Location: tool.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}