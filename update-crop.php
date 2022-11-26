<?php

session_start();

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE crop 
        SET crop.harvest_month = ".$_POST["hm"].", crop.name = ".$_POST["name"].", crop.quantity = ".$_POST["quantity"]." 
        WHERE crop.cid = ".$_POST["cid"]."";

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