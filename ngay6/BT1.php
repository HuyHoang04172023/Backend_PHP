<?php

//student list
$studentList = [
    "student1"=>["name"=>"Nguyen Van A","age"=>18,"score"=>[1,6,1,8,4]],
    "student2"=>["name"=>"Nguyen Van B","age"=>19,"score"=>[1,6,3,2,4]],
    "student3"=>["name"=>"Nguyen Van C","age"=>20,"score"=>[1,6,9,4,4]],
    "student4"=>["name"=>"Nguyen Van D","age"=>19,"score"=>[1,6,5,5,4]],
    "student5"=>["name"=>"Nguyen Van E","age"=>21,"score"=>[1,6,4,1,4]],
];

function showAllStudent($studentList){
    foreach($studentList as $student => $info){
        echo "Name: ".$info['name']."<br>";
        echo "Age: ". $info['age']."<br>";
        echo "Score: ".implode(",",$info['score'])."<br>";
        echo "<br>";
    }
}

function averageScore($scores){
    $totalScore = 0;
    foreach($scores as $score){
        $totalScore += $score;
    }
    return $totalScore/count($scores);
}

function getStudentIdWithHighestAverageScore($studentList){
    $highestScore = 0;
    $idStudent;
    foreach($studentList as $student => $info){
        if(averageScore($info['score']) > $highestScore){
            $highestScore = averageScore($info['score']);
            $idStudent = $student;
        };
    }
    return $idStudent;
}

function showInfoStudentByStudentId($studentId){
    global $studentList;
    foreach($studentList as $student => $info){
        if($student == $studentId){
            echo "Name: ".$info['name']."<br>";
            echo "Age: ". $info['age']."<br>";
            echo "Score: ".implode(",",$info['score'])."<br>";
            echo "AVG Score: ".averageScore($info['score'])."<br>";
            echo "<br>";
        }
    }
}

echo "-----Information of students-----<br>";
showAllStudent($studentList);
echo "-----Student with the highest average score-----<br>";
$studentId = getStudentIdWithHighestAverageScore($studentList);
showInfoStudentByStudentId($studentId);

?>