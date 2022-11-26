<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "DELETE FROM produce WHERE pid = ".$_POST["pid"]."";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

if($stmt->execute())
{
    header("Location: produce.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}