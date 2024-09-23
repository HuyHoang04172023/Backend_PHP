<?php

session_start();
if (isset($_POST["login"])) {
    if ($_POST["username"] == "hoang123" && $_POST["password"] == "hoang123") {
        $_SESSION["username"] = $_POST["username"];
        header("Location: BT3_2.php");
    } else {
        $err = "Incorrect username or password";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username: </label><br>
        <input type="text" name="username" id="username" placeholder="Username is hoang123"><br>

        <label for="password">Password: </label><br>
        <input type="password" name="password" id="password" placeholder="Password is hoang123"><br>
        <?php if (isset($err)): ?>
            <span><?= $err ?></span><br>
        <?php endif; ?>

        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>