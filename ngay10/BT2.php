<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])){
    $check = true;
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format!";
        $check = false;
    }

    if(strlen($password) < 6){
        $passwordErr = "Password must be at least 6 characters long.";
        $check = false;
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br>
        <?php if(isset($nameErr)) :?>
        <span><?php echo $nameErr ?></span><br>
        <?php endif;?>

        <label for="email">Email</label><br>
        <input type="text" name="email" id="email"><br>
        <?php if(isset($emailErr)) :?>
        <span><?php echo $emailErr ?></span><br>
        <?php endif;?>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <?php if(isset($passwordErr)) :?>
        <span><?php echo $passwordErr ?></span><br>
        <?php endif;?>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    if($check == true){
        echo "Name: ".$name."<br>";
        echo "Email: ".$email."<br>";
        echo "Password: ".$password."<br>";
    }
}
?>