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






?>