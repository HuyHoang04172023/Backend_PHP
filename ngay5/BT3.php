<?php

$str = "Hello world. It's a beautiful day.";
$listChar = explode(" ",$str);

echo "String: ".$str."<br>";
echo "-----------------------------------------<br>";
foreach($listChar as $char){
    echo $char."<br>";
}

?> 