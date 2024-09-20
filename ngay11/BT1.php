<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "day11";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT id, name, age, grade FROM students";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table border = "1px">
    <tr>
      <td>Id</td>
      <td>Name</td>
      <td>Age</td>
      <td>Grade</td>
    </tr>
    <?php foreach($result as $row) :?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['age'] ?></td>
        <td><?= $row['grade'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>