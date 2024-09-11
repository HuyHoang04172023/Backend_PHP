<?php

$str = "Hello world. It's a beautiful day.";
$listChar = explode(" ",$str);

echo $str."<br>";
foreach($listChar as $char){
    echo $char."<br>";
}

?> 