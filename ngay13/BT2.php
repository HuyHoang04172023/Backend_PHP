<?php

session_start();

$_SESSION["username"] = "Hello world!";

echo "New username: ".$_SESSION['username'];

?>