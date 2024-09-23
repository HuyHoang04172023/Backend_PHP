<?php

echo "Value of cookie sessionID is ".$_COOKIE['sessionID']."<br>";

if(isset($_POST["remove"])){
    $cookie_name = "sessionID";
    setcookie($cookie_name,'', time()-3600,'/');
    header("Location: BT4_1.php");
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
        <input type="submit" name="remove" value="Remove Cookie">
    </form>
</body>
</html>