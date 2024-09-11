<?php

function isPrime($num){
    $count = 0;
    for($temp = 1; $temp <= $num; $temp++){
        if($num % $temp == 0){
            $count++;
        }
    }
    if($count == 2){
        return true;
    }
}

for($temp = 1; $temp <100; $temp++){
    if(isPrime($temp)){
        echo $temp.'<br>';
    }
}
    
?>