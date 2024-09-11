<?php
$list_number = [1,2,3,4,5,6,7,8,9];

foreach($list_number as $num){
    $count = 0;
    for($temp = 1; $temp <= $num; $temp++){
        if($num % $temp == 0){
            $count++;
        }
    }
    if($count == 2){
        echo $num."<br>";
    }
}
?>