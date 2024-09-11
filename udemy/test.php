<?php 
include "db.php";

//Create
if(isset($_POST['insert'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(username, password) 
            VALUES('$username','$password')";

    mysqli_query($connection, $query);
}

//Read
$query = "SELECT id FROM users";
$listId = mysqli_query($connection, $query);

//Update
if (isset($_POST['update'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE `users` 
    SET username = '$username',
        password ='$password' 
    WHERE id = $id";

    mysqli_query($connection, $query);
    
}

//Delete
if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $query = "DELETE FROM users 
            WHERE id = '$id'";

    mysqli_query($connection, $query);
}

//Check Login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id, username, password
                FROM users";

    $listUser = mysqli_query($connection, $query);

    if($listUser -> num_rows > 0){
        while ($row = $listUser ->fetch_assoc()){
            if($row['username'] == $username 
            && $row['password'] == $password){
                echo "Id of user is ".$row['id'];
            }
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container"> 
        <div class="col-xs-6">
            <form action="test.php" method="POST">
                
                <div class="form-group">  
                    <label for="username">Username</label>  
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">  
                    <label for="password">Password</label>  
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">  
                    <lable for="id">Id user: </lable>
                    <select name="id" class="">
                    <?php
                    if($listId->num_rows > 0){
                        while($row = $listId->fetch_assoc()){
                            echo '<option value="'.$row['id'].'">'.$row['id'].  '</option>';
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="login" value="Login">
                    <input type="submit" class="btn btn-primary" name="insert" value="Insert">
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete" value="Delete">
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>