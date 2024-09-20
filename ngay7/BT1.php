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

?>