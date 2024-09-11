<?php

$school = [
    "SE1801" => [
        ["name" => "Nguyễn Văn A", "age" => 18,"grade" => 8],
        ["name" => "Trần Thị B", "age" => 19,"grade" => 8],
        ["name" => "Lê Văn C", "age" => 18,"grade" => 8]
    ],
    "SE1802" => [
        ["name" => "Phạm Thị D", "age" => 20,"grade" => 8],
        ["name" => "Nguyễn Văn E", "age" => 21,"grade" => 8],
        ["name" => "Trần Văn F", "age" => 22,"grade" => 8]
    ],
    "SE1803" => [
        ["name" => "Lê Thị G", "age" => 19,"grade" => 8],
        ["name" => "Đỗ Văn H", "age" => 20,"grade" => 8],
        ["name" => "Ngô Thị I", "age" => 21,"grade" => 8]
    ]
];

foreach($school as $class => $students){
    echo "Student information of class $class <br>";
    foreach($students as $student){
        foreach($student as $key => $value){
            echo "$key : $value <br>";
        }
    }
    echo "<br>";
}

?>
