<?php
// Tên của thư mục
$dir = "new_directory";

// Tạo một thư mục mới nếu chưa tồn tại
if (!is_dir($dir)) {
    mkdir($dir);
    echo "Đã tạo thư mục: $dir.<br>";

    // Tạo một số tập tin trong thư mục
    for ($i = 1; $i <= 3; $i++) {
        $file = fopen("$dir/file_$i.txt", "w");
        if ($file) {
            fwrite($file, "Đây là nội dung của tập tin file_$i.txt\n");
            fclose($file);
            echo "Đã tạo tập tin: file_$i.txt.<br>";
        }
    }
} else {
    echo "Thư mục $dir đã tồn tại.<br>";
}

// Liệt kê tất cả các tập tin trong thư mục
if (is_dir($dir)) {
    echo "Các tập tin trong thư mục $dir:<br>";
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                echo " - $file<br>";
            }
        }
        closedir($dh);
    }
}

// Xóa tất cả các tập tin trong thư mục
if (is_dir($dir)) {
    echo "Đang xóa các tập tin trong thư mục...<br>";
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            unlink("$dir/$file");
            echo "Đã xóa tập tin: $file<br>";
        }
    }

    // Sau khi xóa tập tin, xóa thư mục
    rmdir($dir);
    echo "Đã xóa thư mục $dir.<br>";
}
?>
