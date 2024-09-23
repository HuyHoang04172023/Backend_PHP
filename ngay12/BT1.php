<?php

$file = "text.txt";

file_put_contents($file, "1 \n", FILE_APPEND);
file_put_contents($file, "2 \n", FILE_APPEND);
file_put_contents($file, "3 \n", FILE_APPEND);
file_put_contents($file, "4 \n", FILE_APPEND);

echo file_get_contents($file)."<br>";


$fileOpen = fopen($file, "r");

if ($fileOpen) {
    while (($line = fgets($fileOpen)) !== false) {
        echo $line . "<br>";
    }

    if (!feof($fileOpen)) {
        echo "Có lỗi xảy ra trong quá trình đọc tệp.\n";
    }

    fclose($fileOpen);
} else {
    echo "Không thể mở tệp.\n";
}

?>
