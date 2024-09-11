<?php

function factorial($num){
    if($num > 0){
        return $num * factorial($num - 1); 
    }else{
        return 1;
    }
}

echo factorial(4);

?>
