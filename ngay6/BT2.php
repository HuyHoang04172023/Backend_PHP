<?php

function isPalindrome($string) {
    $reversedString = strrev($string);
    if ($string === $reversedString) {
        echo "$string is palindrome.";
    } else {
        echo "$string is not palindrome.";
    }
    echo "<br>";
}

isPalindrome("madam");
isPalindrome("hello");

?>
