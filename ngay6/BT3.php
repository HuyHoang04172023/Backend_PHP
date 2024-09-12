<?php

session_start();

if(isset($_POST['reset'])){
    $_SESSION['workList'] = [];
}

if (isset($_SESSION['workList'])) {
    $workList = $_SESSION['workList'];
} else {
    $workList = [];
}

//Insert
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];
    if (!empty($workList)) {
        $newId = max(array_keys($workList)) + 1;
    } else {
        $newId = 1;
    }

    $workList[$newId] = ["name" => $name,
                         "deadline" => date('d-m-Y', strtotime($deadline)), 
                         "status" => $status];
    $_SESSION['workList'] = $workList;
}

//Update
if(isset($_POST['save'])){
    $id = $_POST['idUpdate'];
    $name = $_POST['nameUpdate'];
    $deadline = $_POST['deadlineUpdate'];
    $status = $_POST['statusUpdate'];

    $workList[$id] = ["name" => $name,
                      "deadline" => date('d-m-Y', strtotime($deadline)), 
                      "status" => $status];
    $_SESSION['workList'] = $workList;
}



//Delete
if(isset($_POST['delete'])){
    unset($workList[$_POST['id']]);
    $_SESSION['workList'] = $workList;
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
    <!-- Form insert work -->
    <form action="BT3.php" method="post">
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name"><br>
            <label for="deadline">Deadline:</label><br>
            <input type="date" name="deadline" id="deadline"><br>
            <label for="status">Status:</label><br>
            <select name="status" id="status">
                <option value="pending">Pending</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select><br>
            <input type="submit" name="insert" value="Insert">
            <input type="submit" name="reset" value="Reset">

        </div>
    </form>

    <!-- Show information -->
    <?php if (!empty($workList)) : ?>
        <div>
            <table border="1px">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Deadline</td>
                    <td>Status</td>
                    <td>Option</td>
                </tr>
                <?php foreach ($workList as $work => $info): ?>
                    <tr>
                        <form action="BT3.php" method="post">
                            <td>
                                <?= $work ?>
                                <input type="hidden" name="id" value="<?= $work ?>">
                            </td>
                            <td><?= htmlspecialchars($info['name']) ?></td>
                            <td><?= htmlspecialchars($info['deadline']) ?></td>
                            <td><?= htmlspecialchars($info['status']) ?></td>
                            <td>
                                <input type="submit" name="update" value="Update">
                                <input type="submit" name="delete" value="Delete">
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    <?php endif; ?>

    <!-- Update information -->
    <?php if (isset($_POST['update'])) : ?>
        <?php foreach($workList as $work => $info) :?>
            <?php if($work == $_POST['id']) :?>
                <div>
                    <p>Update information of word ID <?= htmlspecialchars($work) ?></p>
                    <form action="BT3.php" method="post">
                        <input type="hidden" name="idUpdate" value="<?= $work ?>">
                        <label for="name">Name:</label><br>
                        <input type="text" name="nameUpdate" id="nameUpdate" 
                        value="<?= htmlspecialchars($info['name']) ?>"><br>
                        <label for="deadline">Deadline:</label><br>
                        <input type="date" name="deadlineUpdate" id="deadlineUpdate" 
                        value="<?= date('Y-m-d', strtotime($info['deadline'])) ?>"><br>
                        <label for="status">Status:</label>
                        <select name="statusUpdate" id="statusUpdate">
                            <option value="pending" 
                            <?= ($info['status'] == 'pending') ? 'selected' : ''; ?>>
                            Pending
                            </option>
                            <option value="doing"
                            <?= ($info['status'] == 'doing') ? 'selected' : ''; ?>>
                            Doing
                            </option>
                            <option value="done"
                            <?= ($info['status'] == 'done') ? 'selected' : ''; ?>>
                            Done
                            </option>
                        </select><br>
                        <input type="submit" name="save" value="Save">
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach;?>
    <?php endif; ?>
</body>
</html>