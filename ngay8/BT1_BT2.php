<?php

class Person{
    public $name;
    public $age;

    function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

    function get_name(){
        return $this->name;
    }

    function get_age(){
        return $this->age;
    }

    function displayInfo() {
        echo "Name: " . $this->name . "\n";
        echo "Age: " . $this->age . "\n";
    }
}

class Employee extends Person{
    public $jobTitle;

    function get_jobTitle (){
        return $this->jobTitle;
    }

    function __construct($name, $age, $jobTitle) {
        parent::__construct($name, $age);
        $this->jobTitle = $jobTitle;
    }

    // Phương thức hiển thị thông tin công việc
    function displayJobInfo() {
        parent::displayInfo();
        echo "Job Title: " . $this->jobTitle . "\n";
    }
}

$obj = new Employee ("Hoaangg", 12, "Abc");
echo $obj->displayJobInfo();

?>