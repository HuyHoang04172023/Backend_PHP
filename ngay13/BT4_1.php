<?php

if(isset($_POST["set"])) {
    $cookie_name = "sessionID";
    $cookie_value = "123456789";

    setcookie($cookie_name,$cookie_value, time() + 3600,"/");

    header("Location: BT4_2.php");
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
        <input type="submit" name="set" value="Set Cookie">
    </form>
</body>
</html>