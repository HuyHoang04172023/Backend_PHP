<?php

for($a = 1; $a <= 10; $a++){
    for($b = 1; $b <= 10; $b++){
        if($a*$b % 2 == 0){
            echo "(C)";
        }else{
            echo "(L)"; 
        }
        echo $a .'*'. $b. "=".$a*$b; 
        echo "<br>";
    }
    echo '<br>';
}

?>