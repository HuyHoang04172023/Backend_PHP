<?php

function isPalindrome($string) {
    $reversedString = strrev($string);
    ($string === $reversedString)?true:false;
}

function displayPalindromeResult($string){
    if(isPalindrome($string)){
        echo "$string is palindrome!";
    }else{
        echo "$string is not palindrome!";
    }
    echo "<br>";
}

displayPalindromeResult("radar");
displayPalindromeResult("aiusdahsid");

?>
