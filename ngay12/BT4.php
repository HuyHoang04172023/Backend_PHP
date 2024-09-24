<?php
// Kiểm tra nếu người dùng đã nhấn nút "Tải lên"
if (isset($_POST["submit"])) {
    // Thư mục đích để lưu tập tin
    $target_dir = "uploads/";
    
    // Lấy thông tin tập tin được tải lên
    $file_name = basename($_FILES["fileUpload"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    
    // Lấy loại tập tin và kích thước
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_size = $_FILES["fileUpload"]["size"];

    // Kiểm tra loại tập tin (chỉ cho phép ảnh và tài liệu)
    $allowed_file_types = ["jpg", "jpeg", "png", "gif", "pdf", "doc", "docx"];
    if (!in_array($file_type, $allowed_file_types)) {
        echo "Chỉ cho phép tải lên các tập tin: JPG, JPEG, PNG, GIF, PDF, DOC, DOCX.<br>";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước tập tin (giới hạn 5MB)
    if ($file_size > 5000000) { // 5MB = 5 * 1024 * 1024
        echo "Tập tin quá lớn. Giới hạn kích thước là 5MB.<br>";
        $uploadOk = 0;
    }

    // Kiểm tra nếu không có lỗi nào và tiến hành di chuyển tập tin
    if ($uploadOk == 1) {
        // Kiểm tra nếu thư mục đích không tồn tại, tạo thư mục
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Di chuyển tập tin đến thư mục đích
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "Tập tin ". htmlspecialchars($file_name) . " đã được tải lên thành công.<br>";
        } else {
            echo "Đã xảy ra lỗi khi tải lên tập tin.<br>";
        }
    } else {
        echo "Tải lên tập tin thất bại.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên tập tin</title>
</head>
<body>
    <h2>Tải lên hình ảnh hoặc tài liệu</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Chọn tập tin để tải lên:</label>
        <input type="file" name="fileUpload" id="fileUpload">
        <input type="submit" name="submit" value="Tải lên">
    </form>
</body>
</html>
