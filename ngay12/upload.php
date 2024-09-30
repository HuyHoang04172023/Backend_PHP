<?php
if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    
    $file_name = basename($_FILES["fileUpload"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_size = $_FILES["fileUpload"]["size"];

    $allowed_file_types = ["jpg", "jpeg", "png", "gif", "pdf", "doc", "docx"];
    if (!in_array($file_type, $allowed_file_types)) {
        echo "Allow uploading of only files: JPG, JPEG, PNG, GIF, PDF, DOC, DOCX.<br>";
        $uploadOk = 0;
    }

    if ($file_size > 5000000) {
        echo "File is too large. Size limit is 5M.<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars($file_name) . " has been uploaded successfully.<br>";
        } else {
            echo "An error occurred while uploading the file..<br>";
        }
    } else {
        echo "File upload failed.<br>";
    }
}
?>
