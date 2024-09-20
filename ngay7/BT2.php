<?php

class Student {
    private $name;
    private $age;
    private $grade;

    function __construct($name,$age,$grade){
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

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

$stu = new Student("Hoang",22,6);
$stu -> set_name("Huy");
$stu -> set_age(18);
$stu -> set_grade(5);

echo "Name: ".$stu->get_name()."<br>";
echo "Age: ".$stu->get_age()."<br>";
echo "Grade: ". $stu->get_grade()."<br>";

?>