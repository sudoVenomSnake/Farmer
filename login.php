<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $_POST["email"]);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user)
    {
        if(password_verify($_POST["password"], $user["password_hash"]))
        {
            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/holiday.css@0.9.8" />
</head>
<body>

    <h1>Login</h1>

    <?php if($is_invalid): ?>
        <em>Invalid Login</em>
    <?php endif; ?>

    <form method = "post">
        <label for = "email">Email</label>
        <input type = "email" name = "email" id = "email"
            value = "<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for = "password">Password</label>
        <input type = "password" name = "password" id = "password">

        <button>Log In</button>
    </form>
</body>
</html>