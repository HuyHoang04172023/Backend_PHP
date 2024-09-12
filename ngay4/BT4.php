<?php

$numbers = [8732,2734,2455,3495,1231,4945,2522,2435];
//ASC
sort($numbers);
echo "ASC: ";
foreach($numbers as $num){
    echo $num. ", ";
}

echo "<br>";

//DESC
function sortDESC($a, $b) {
    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
  }

usort($numbers,"sortDESC");
echo "DESC: ";
foreach($numbers as $num){
    echo $num. ", ";
}

?>