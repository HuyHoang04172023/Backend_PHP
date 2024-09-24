<?php
// Tên của tập tin
$filename = "example.txt";

// Kiểm tra xem tập tin có tồn tại hay không
if (file_exists($filename)) {
    // Nếu tập tin tồn tại, đọc và hiển thị nội dung
    echo "Tập tin $filename đã tồn tại. Nội dung của tập tin:<br>";
    
    // Mở tập tin để đọc
    $file = fopen($filename, "r");
    if ($file) {
        // Đọc và hiển thị nội dung của tập tin
        while (!feof($file)) {
            echo fgets($file) . "<br>";
        }
        // Đóng tập tin
        fclose($file);
    } else {
        echo "Không thể mở tập tin để đọc.<br>";
    }
} else {
    // Nếu tập tin không tồn tại, tạo tập tin mới và ghi dữ liệu vào
    echo "Tập tin $filename không tồn tại. Đang tạo tập tin mới...<br>";
    
    // Mở tập tin với chế độ ghi
    $file = fopen($filename, "w");
    if ($file) {
        // Ghi dữ liệu vào tập tin
        $data = "Xin chào! Đây là dữ liệu mới được ghi vào tập tin.\n";
        fwrite($file, $data);
        
        // Đóng tập tin sau khi ghi
        fclose($file);
        echo "Đã tạo và ghi dữ liệu vào tập tin $filename.<br>";
    } else {
        echo "Không thể tạo tập tin mới.<br>";
    }
}
?>
