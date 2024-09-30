<?php
$filename = "test.txt";

if (file_exists($filename)) {
    echo "The file $filename already exists. Contents of the file:<br>";
    
    $file = fopen($filename, "r");
    if ($file) {
        while (!feof($file)) {
            echo fgets($file) . "<br>";
        }
        fclose($file);
    } else {
        echo "Cannot open file for writing.<br>";
    }
} else {
    echo "File $filename does not exist. Creating new file...<br>";
    
    $file = fopen($filename, "w");
    if ($file) {
        $data = "Hello world.\n";
        fwrite($file, $data);
        
        fclose($file);
        echo "Created and wrote data to file $filename.<br>";
    } else {
        echo "Cannot open file for writing.<br>";
    }
}
?>
