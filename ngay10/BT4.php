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
    $age = test_input($_POST['age']);
    $address = test_input($_POST['address']);

    if(empty($name)){
        $nameErr = "Name cannot be blank.";
        $check = false;
    }

    if(!filter_var($age, FILTER_VALIDATE_INT)){
        $ageErr = "Age must be an integer.";
    }elseif($age < 18){
        $ageErr = "Age must greater than or equal to 18.";
        $check = false;
    }

    $pattern = "/^[a-zA-Z0-9\s,.-\/]+$/";
    if(!preg_match($pattern,$address)){
        $addressErr = "The address cannot contain special characters.";
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

        <label for="age">Age</label><br>
        <input type="text" name="age" id="age"><br>
        <?php if(isset($ageErr)) :?>
        <span><?php echo $ageErr ?></span><br>
        <?php endif;?>

        <label for="address">Address</label><br>
        <input type="text" name="address" id="address"><br>
        <?php if(isset($addressErr)) :?>
        <span><?php echo $addressErr ?></span><br>
        <?php endif;?>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    if($check == true){
        echo "Name: ".$_POST['name']."<br>";
        echo "Email: ".$_POST['age']."<br>";
        echo "Phone: ".$_POST['address']."<br>";
    }
}
?>