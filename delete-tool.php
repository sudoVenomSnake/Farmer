<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "DELETE FROM tools WHERE tid = ".$_POST["tid"]."";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

if($stmt->execute())
{
    header("Location: tool.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}