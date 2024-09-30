
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Upload images or documents</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Select file to upload:</label>
        <input type="file" name="fileUpload" id="fileUpload">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>