<?php

include "test2.php";
$number1 = 1;
$number2 = 2;

function Sum()
{
    return $GLOBALS['number1'] + $GLOBALS['number2'] + $GLOBALS['number3'];
} 

function test(){
    static $a = 0;
    echo $a;
    $a++;
}

for($temp = 0 ; $temp < 10; $temp++){
    test();
}

?>