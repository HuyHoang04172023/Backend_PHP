<?php

function isPrime($num) {
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}


for($temp = 1; $temp <100; $temp++){
    if(isPrime($temp)){
        echo $temp.'<br>';
    }
}
    
?>