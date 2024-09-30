<?php
$filename = "test.txt";

$file = fopen($filename, "w");
if ($file) {
    $data = "Hello world.\n";
    fwrite($file, $data);

    fclose($file);
    echo "Data written to file $filename.<br>";
} else {
    echo "Cannot open file for writing.<br>";
}

$file = fopen($filename, "r");
if ($file) {
    echo "Contents of the file $filename:<br>";
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
} else {
    echo "Cannot open file for writing.<br>";
}
?>
