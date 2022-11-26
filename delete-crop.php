<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "DELETE FROM crop WHERE cid = ".$_POST["cid"]."";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

if($stmt->execute())
{
    header("Location: crop.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}