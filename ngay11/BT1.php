<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<?php

try{
    $sql = "INSERT INTO students (name, age, grade) 
  VALUES ('Nguyen', 18, 8.5)";
    $conn->exec($sql);
    echo "New record created successfully!";
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>