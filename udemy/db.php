<?php

$connection = mysqli_connect('localhost','root','','loginapp');
    if($connection){
        echo "Oke";
    }else{
        die("Connect false!");
    }


?>