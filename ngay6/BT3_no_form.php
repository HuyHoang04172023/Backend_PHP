<?php

//Insert
function insertWork($name,$deadline,$status){
    global $workList;
    if (!empty($workList)) {
        $newId = max(array_keys($workList)) + 1;
    } else {
        $newId = 1;
    }

    $workList[$newId] = ["name" => $name,
                         "deadline" => $deadline, 
                         "status" => $status];
    
    echo "Insert work successful with work ID is $newId<br>";
}

//Show data
function showWork(){
    global $workList;
    echo "<br>-------------Show Work-------------<br>";
    foreach ($workList as $workId => $work){
        echo "Work ID is ".$workId."<br>";
        foreach($work as $key => $value){
            echo "$key : $value <br>";
        }
        echo "<br>";
    }
}

//Update
function updateWork($id,$name,$deadline,$status){
    global $workList;
    $workList[$id] = ["name" => $name,
                      "deadline" => $deadline, 
                      "status" => $status];
    echo "Update work successful with work ID is $id<br>";
}

//Delete
function deleteWork($id){
    global $workList;
    unset($workList[$id]);
    echo "Delete work successful with work ID is $id<br>";
}

/*------------------------------------------------------*/
$workList = [];
insertWork("Update Task 1","20-11-2024","Doing");
insertWork("Create Task 2","23-09-2024","Pending");
showWork();

updateWork("2","Create Task 2","15-11-2024","Completed");
showWork();

deleteWork("1");
showWork();
/*------------------------------------------------------*/

?>