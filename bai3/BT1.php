<?php

function sum($number1, $number2)
{
    return $number1 + $number2;
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
    <h1><?php echo sum(1,2); ?></h1>
</body>
</html>