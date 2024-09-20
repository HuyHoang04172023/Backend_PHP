<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "day11";

//Connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['update'])){
  $studentId = test_input($_POST['studentId']);
}

//Update Student
if(isset($_POST['save'])){
  try{
    $sql = "UPDATE students SET name=:name, age=:age, grade=:grade WHERE id=:studentId";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":age", $age);
    $stmt->bindParam(":grade", $grade);
    $stmt->bindParam(":studentId", $studentId);

    $name = test_input($_POST['nameUpdate']);
    $age = test_input($_POST['ageUpdate']);
    $grade = test_input($_POST['gradeUpdate']);
    $studentId = test_input($_POST['studentId']);
    $stmt->execute();
  }catch(PDOException $e){
    echo $sql. $e->getMessage();
  }
}

//Get information student
try {
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
      <td>Option</td>
    </tr>
    <?php foreach($result as $row) :?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['age'] ?></td>
        <td><?= $row['grade'] ?></td>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <input type="hidden" name="studentId" value="<?= $row['id'] ?>">
          <td><input type="submit" name="update" value="Update"></td>
        </form>
      </tr>
    <?php endforeach; ?>
  </table>

  <!-- Update Form -->
  <?php if(isset($_POST['update'])) : ?>
    <?php foreach($result as $row) :?>
      <?php if($row['id'] == $studentId) : ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

          <input type="hidden" name="studentId" value="<?= $studentId ?>">

          <label for="name">Name:</label><br>
          <input type="text" name="nameUpdate" id="name" value="<?= $row['name'] ?>"><br>

          <label for="age">Age:</label><br>
          <input type="text" name="ageUpdate" id="age" value="<?= $row['age'] ?>"><br>

          <label for="grade">Grade:</label><br>
          <input type="text" name="gradeUpdate" id="grade" value="<?= $row['grade'] ?>"><br>

          <input type="submit" name="save" value="Save">
        </form>
      <?php endif;?>
    <?php endforeach; ?>
  <?php endif;?>
</body>
</html>