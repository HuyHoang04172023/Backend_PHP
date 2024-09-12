<?php

class Student {
    public $name;
    public $age;
    public $grade;

    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }

    function set_age($age){
        $this->age = $age;
    }

    function get_age(){
        return $this->age;
    }

    function set_grade($grade){
        $this->grade = $grade;
    }

    function get_grade(){
        return $this->grade;
    }
}

$stu = new Student();
$stu -> set_name("Hoang");
$stu -> set_age(22);
$stu -> set_grade(6);

echo "Name: ".$stu->get_name()."<br>";
echo "Age: ".$stu->get_age()."<br>";
echo "Grade: ". $stu->get_grade()."<br>";






?>