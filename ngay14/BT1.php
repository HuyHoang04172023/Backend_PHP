<?php
function divide($numerator, $denominator) {
    try {
        if ($denominator == 0) {
            // Nếu số chia bằng 0, ném ngoại lệ
            throw new Exception("Error: Division by zero is not allowed.");
        }
        $result = $numerator / $denominator;
        return $result;
    } catch (Exception $e) {
        // Xử lý ngoại lệ và hiển thị thông báo lỗi
        echo $e->getMessage();
    }
}

// Test hàm divide
$numerator = 10;
$denominator = 0; // Số chia bằng 0 để kiểm tra

$result = divide($numerator, $denominator);
if ($result !== null) {
    echo "Result: $result";
}
?>
