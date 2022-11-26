<?php

session_start();

if(isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmophile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/holiday.css@0.9.8" />
</head>
<body>

    <h1>Farmophile</h1>

    <?php if(isset($user)): ?>

        <p>Name - <?= htmlspecialchars($user["name"]) ?></p>
        <p>Email - <?= htmlspecialchars($user["email"]) ?></p>
        <p>Aadhar - <?= htmlspecialchars($user["aadhar"]) ?></p>
        <p>City/Village/Taluka - <?= htmlspecialchars($user["city_village_taluka"]) ?></p>
        <p>State - <?= htmlspecialchars($user["state"]) ?></p>
        <p>Date of Birth - <?= htmlspecialchars($user["dob"]) ?></p>
        <p>Pincode - <?= htmlspecialchars($user["pincode"]) ?></p>
        <p>Blood Group - <?= htmlspecialchars($user["blood_group"]) ?></p>
        <p>Phone Number - <?= htmlspecialchars($user["phone_number"]) ?></p>

        <p><a href = "crop.php">Crop details.</a></p>

        <p><a href = "tool.php">Tool details.</a></p>

        <p><a href = "loan.php">Loan details.</a></p>

        <p><a href = "produce.php">Produce history.</a></p>

        <p><a href = "logout.php">Log out.</a></p>

    <?php else: ?>
        <p><a href = "login.php">Log in</a> or <a href = "signup.html">Sign up.</a></p>

    <?php endif; ?>

</body>
</html>