<?php
$dir = "new_directory";

if (!is_dir($dir)) {
    mkdir($dir);
    echo "Created folder: $dir.<br>";

    for ($i = 1; $i <= 3; $i++) {
        $file = fopen("$dir/file_$i.txt", "w");
        if ($file) {
            fwrite($file, "Hello World!\n");
            fclose($file);
            echo "File created: file_$i.txt.<br>";
        }
    }
} else {
    echo "The directory $dir already exists.<br>";
}

if (is_dir($dir)) {
    echo "Files in directory $dir:<br>";
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                echo " - $file<br>";
            }
        }
        closedir($dh);
    }
}

if (is_dir($dir)) {
    echo "Deleting files in folder...<br>";
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            unlink("$dir/$file");
            echo "Deleted file: $file<br>";
        }
    }

    // Sau khi xóa tập tin, xóa thư mục
    rmdir($dir);
    echo "Deleted directory $dir.<br>";
}
?>
