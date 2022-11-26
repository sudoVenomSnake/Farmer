<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "DELETE FROM loan WHERE lid = ".$_POST["lid"]."";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
    die("SQL error");
}

if($stmt->execute())
{
    header("Location: loan.php");
    exit;
}
else
{
    die($mysqli->error . " " . $mysqli->errno);
}