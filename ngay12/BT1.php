<?php
// Tên của tập tin
$filename = "example.txt";

// Tạo một tập tin mới và ghi dữ liệu vào
$file = fopen($filename, "w"); // Mở tập tin với chế độ ghi (write)
if ($file) {
    // Ghi dữ liệu vào tập tin
    $data = "Xin chào! Đây là dữ liệu ghi vào tập tin.\n";
    fwrite($file, $data);

    // Đóng tập tin sau khi ghi
    fclose($file);
    echo "Đã ghi dữ liệu vào tập tin $filename.<br>";
} else {
    echo "Không thể mở tập tin để ghi.<br>";
}

// Mở lại tập tin để đọc dữ liệu
$file = fopen($filename, "r"); // Mở tập tin với chế độ đọc (read)
if ($file) {
    // Đọc và hiển thị nội dung của tập tin
    echo "Nội dung của tập tin $filename:<br>";
    while (!feof($file)) {
        // Đọc từng dòng trong tập tin và hiển thị
        echo fgets($file) . "<br>";
    }

    // Đóng tập tin sau khi đọc
    fclose($file);
} else {
    echo "Không thể mở tập tin để đọc.<br>";
}
?>
