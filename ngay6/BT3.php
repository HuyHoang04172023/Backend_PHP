<?php

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Reset
if(isset($_POST['reset'])){
    $_SESSION['workList'] = [];
}

//Get work list in session
if (isset($_SESSION['workList'])) {
    $workList = $_SESSION['workList'];
} else {
    $workList = [];
}

//Insert
if (isset($_POST['insert'])) {
    $name = test_input($_POST['name']);
    $deadline = test_input($_POST['deadline']);
    $status = test_input($_POST['status']);
        
    array_push($workList,["name" => $name,
                        "deadline" => date('d-m-Y', strtotime($deadline)), 
                        "status" => $status]);
    $_SESSION['workList'] = $workList;
}

//Update
if(isset($_POST['save'])){
    $id = test_input($_POST['idUpdate']);
    $name = test_input($_POST['nameUpdate']);
    $deadline = test_input($_POST['deadlineUpdate']);
    $status = test_input($_POST['statusUpdate']);

    $workList[$id] = ["name" => $name,
                      "deadline" => date('d-m-Y', strtotime($deadline)), 
                      "status" => $status];
    $_SESSION['workList'] = $workList;
}

//Delete
if(isset($_POST['delete'])){
    $id = test_input($_POST['workId']);
    unset($workList[$id]);
    $_SESSION['workList'] = $workList;
}

// Mark as completed or doing
if(isset($_POST['markComplete'])) {
    $id = test_input($_POST['workId']);
    $workList[$id]['status'] = 'completed';
    $_SESSION['workList'] = $workList;
} else if (isset($_POST['workId']) && !isset($_POST['update'])) {
    $id = test_input($_POST['workId']);
    $workList[$id]['status'] = 'doing';
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
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div>
            <div>
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name"><br>
            </div>
            <div>
                <label for="deadline">Deadline:</label><br>
                <input type="date" name="deadline" id="deadline"><br>
            </div>
            <div>
                <label for="status">Status:</label><br>
                <select name="status" id="status">
                    <option value="pending">Pending</option>
                    <option value="doing">Doing</option>
                    <option value="completed">Completed</option>
                </select><br>
            </div>
            <div>
                <input type="submit" name="insert" value="Insert">
                <input type="submit" name="reset" value="Reset">
            </div>
        </div>
    </form>

    <!-- Show information -->
    <?php if (!empty($workList)) : ?>
        <div>
            <table border="1px">
                <tr>
                <td>Completed</td>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Deadline</td>
                    <td>Status</td>
                    <td>Option</td>
                </tr>
                <?php foreach ($workList as $workId => $info): ?>
                    <tr>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <td>
                                <input type="checkbox" name="markComplete" 
                                    value="1" <?= $info['status'] == 'completed' ? 'checked' : ''; ?>
                                    onchange="this.form.submit()">
                            </td>
                            <td>
                                <?= $workId ?>
                                <input type="hidden" name="workId" value="<?= $workId ?>">
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
        <?php foreach($workList as $workId => $info) :?>
            <?php if($workId == $_POST['workId']) :?>
                <div>
                    <p>Update information of word ID <?= htmlspecialchars($workId) ?></p>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div>
                            <input type="hidden" name="idUpdate" value="<?= $workId ?>">  
                        </div>
                        <div>
                            <label for="name">Name:</label><br>
                            <input type="text" name="nameUpdate" id="nameUpdate" 
                            value="<?= htmlspecialchars($info['name']) ?>"><br>
                        </div>
                        <div>
                            <label for="deadline">Deadline:</label><br>
                            <input type="date" name="deadlineUpdate" id="deadlineUpdate" 
                            value="<?= date('Y-m-d', strtotime($info['deadline'])) ?>"><br>
                        </div>
                        <div>
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
                                <option value="completed"
                                <?= ($info['status'] == 'completed') ? 'selected' : ''; ?>>
                                Completed
                                </option>
                            </select><br>
                        </div>
                        <input type="submit" name="save" value="Save">
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach;?>
    <?php endif; ?>
</body>
</html>