<?php

function factorial($num){
    if($num < 0){
        return "Must be positive!";
    }elseif($num == 0){
        return 1;
    }else{
        return $num * factorial($num - 1);
    }
}

echo factorial(4);

?>
