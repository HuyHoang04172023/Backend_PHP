<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "day11";

//Connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Create
if (isset($_POST['insert'])) {
  $name = test_input($_POST['name']);
  $price = test_input($_POST['price']);
  $quantity = test_input($_POST['quantity']);
  $validate = true;

  //Validate form
  if (empty($name)) {
    $nameErr = "Name cannot be blank.";
    $validate = false;
  }
  if (!is_numeric($price) || $price <= 0) {
    $priceErr = "Price is invalid. Please enter a positive number.";
    $validate = false;
  }
  if (!is_numeric($quantity) || $quantity <= 0) {
    $quantityErr = "Invalid quantity. Please enter a positive number.";
    $validate = false;
  }

  //Insert data
  if ($validate) {
    $sql = "INSERT INTO `products`(`name`, `price`, `quantity`) 
      VALUES (:name, :price, :quantity)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":quantity", $quantity);

    $stmt->execute();
  }
}

//Update
if (isset($_POST['update'])) {
  $productId = test_input($_POST['productId']);
}

if (isset($_POST['save'])) {
  $productId = test_input($_POST['productId']);
  $name = test_input($_POST['nameUpdate']);
  $price = test_input($_POST['priceUpdate']);
  $quantity = test_input($_POST['quantityUpdate']);
  $validate = true;

  //Validate form
  if (empty($name)) {
    $nameUErr = "Name cannot be blank.";
    $validate = false;
  }
  if (!is_numeric($price) || $price <= 0) {
    $priceUErr = "Price is invalid. Please enter a positive number.";
    $validate = false;
  }
  if (!is_numeric($quantity) || $quantity <= 0) {
    $quantityUErr = "Invalid quantity. Please enter a positive number.";
    $validate = false;
  }

  //Update data
  if ($validate) {
    $sql = "UPDATE `products` 
            SET `name`=:name,
            `price`=:price,
            `quantity`=:quantity 
            WHERE `id` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":quantity", $quantity);
    $stmt->bindParam(":id", $productId);

    $stmt->execute();
  }

}

//Delete
if (isset($_POST['delete'])) {
  $productId = test_input($_POST['productId']);

  try {
    $sql = "DELETE FROM `products` WHERE id = :productId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":productId", $productId);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $sql . $e->getMessage();
  }
}

//Read
try {
  $sql = "SELECT id, name, price, quantity FROM products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
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

  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <label for="name">Name: </label><br>
    <input type="text" name="name" id="name"><br>
    <?php if (isset($nameErr)): ?>
      <span><?= $nameErr ?></span><br>
    <?php endif; ?>


    <label for="price">Price: </label><br>
    <input type="text" name="price" id="price"><br>
    <?php if (isset($priceErr)): ?>
      <span><?= $priceErr ?></span><br>
    <?php endif; ?>

    <label for="quantity">Quantity: </label><br>
    <input type="number" name="quantity" id="quantity"><br>
    <?php if (isset($quantityErr)): ?>
      <span><?= $quantityErr ?></span><br>
    <?php endif; ?>

    <input type="submit" name="insert" value="Insert">
  </form>

  <!-- Show Information Product -->
  <?php if ($result != null): ?>
    <table border="1px">
      <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Option</td>
      </tr>
      <?php foreach ($result as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['price'] ?></td>
          <td><?= $row['quantity'] ?></td>
          <td>
            <form action="" method="post">
              <input type="hidden" name="productId" value="<?= $row['id'] ?>">
              <input type="submit" name="update" value="Update">
              <input type="submit" name="delete" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>

  <!-- Show Form Update Product-->
  <?php if (isset($_POST['update'])): ?>


    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <?php foreach ($result as $row): ?>
        <?php if ($row['id'] == $productId): ?>

          <p>Update product with id <?= $productId ?></p>
          <input type="hidden" name="productId" value="<?= $productId ?>">

          <label for="nameUpdate">Name: </label><br>
          <input type="text" name="nameUpdate" id="nameUpdate" value="<?= $row['name'] ?>"><br>
          <?php if (isset($nameErr)): ?>
            <span><?= $nameUErr ?></span><br>
          <?php endif; ?>


          <label for="priceUpdate">Price: </label><br>
          <input type="text" name="priceUpdate" id="priceUpdate" value="<?= $row['price'] ?>"><br>
          <?php if (isset($priceErr)): ?>
            <span><?= $priceUErr ?></span><br>
          <?php endif; ?>

          <label for="quantityUpdate">Quantity: </label><br>
          <input type="number" name="quantityUpdate" id="quantityUpdate" value="<?= $row['quantity'] ?>"><br>
          <?php if (isset($quantityErr)): ?>
            <span><?= $quantityUErr ?></span><br>
          <?php endif; ?>

        <?php endif; ?>
      <?php endforeach; ?>
      <input type="submit" name="save" value="Save">
    </form>
  <?php endif; ?>
</body>

</html>