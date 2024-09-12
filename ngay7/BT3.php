<?php

class Car {
    public $brand;
    public $model;
    public $year;

    function __construct($brand,$model,$year){
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    function get_brand(){
        return $this->brand;
    }

    function get_model(){
        return $this->model;
    }

    function get_year(){
        return $this->year;
    }
}

$honda = new Car("Honda","Normal",2024);

echo $honda->get_brand()."<br>";
echo $honda->get_model()."<br>";
echo $honda->get_year()."<br>";

?>