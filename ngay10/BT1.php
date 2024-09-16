<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    echo "Name: ".$_POST['name']."<br>";
    echo "Email: ".$_POST['email']."<br>";
    echo "Password: ".$_POST['password']."<br>";
}

?>