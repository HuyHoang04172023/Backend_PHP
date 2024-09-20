<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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

//Insert Student
if(isset($_POST['insert'])){
    $validate = true;
    $name = test_input($_POST['name']);
    $age = test_input($_POST['age']);
    $grade = test_input($_POST['grade']);


    //Validate form
    if (preg_match('/[0-9]/', $name)) {
        $nameErr = "Tên không được chứa số.";
        $validate = false;
    }

    if (!is_numeric($age) || $age <= 0) {
        $ageErr = "Tuổi không hợp lệ. Vui lòng nhập số dương.";
        $validate = false;
    }

    if ($age < 1 || $age > 120) {
        $ageErr = "Tuổi phải nằm trong khoảng từ 1 đến 120.";
        $validate = false;
    }

    if (!is_numeric($grade)) {
        $gradeErr = "Điểm không hợp lệ. Vui lòng nhập một số.";
        $validate = false;
    }

    if ($grade < 0 || $grade > 10) {
        $gradeErr = "Điểm phải nằm trong khoảng từ 0 đến 10.";
        $validate = false;
    }



    if($validate){
        try {

            $sql = "INSERT INTO `students`(`name`, `age`, `grade`) 
            VALUES (:name, :age, :grade)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":age", $age);
            $stmt->bindParam(":grade", $grade);

            $stmt->execute();

        } catch(PDOException $e) {
          echo $sql . $e->getMessage();
        }
    }
}

//Get information student
try {
    $sql = "SELECT id, name, age, grade FROM students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    echo $sql . $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Insert Student -->
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <label for="name">Name: </label><br>
        <input type="text" name="name" id="name"><br>
        <?php if(isset($nameErr)):?>
            <span><?= $nameErr?></span><br>
        <?php endif;?>

        <label for="age">Age: </label><br>
        <input type="number" name="age" id="age"><br>
        <?php if(isset($ageErr)):?>
            <span><?= $ageErr?></span><br>
        <?php endif;?>

        <label for="grade">Grade: </label><br>
        <input type="text" name="grade" id="grade"><br>
        <?php if(isset($gradeErr)):?>
            <span><?= $gradeErr?></span><br>
        <?php endif;?>

        <input type="submit" name="insert" value="Insert">

    </form>


    <!-- Show Information Student -->
     <?php if($result != null):?>
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
  <?php endif;?>
</body>
</html>