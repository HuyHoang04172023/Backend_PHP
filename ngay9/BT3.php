<?php

interface VehicleInterface{
	public function startEngine();
	public function stopEngine();
}

class Car implements VehicleInterface{
	public function startEngine(){
		echo "The car has started!<br>";
	}

	public function stopEngine(){
		echo "The car has stopped!<br>";
	}
}

class Bike implements VehicleInterface{
	public function startEngine(){
		echo "The bike has started!<br>";
	}

	public function stopEngine(){
		echo "The bike has stopped!<br>";
	}
}

class ElectricCar extends Car{
	
}

$car = new Car();
$bike = new Bike();
$electricCar = new ElectricCar();

echo "-------------Car-------------<br>";
$car->startEngine();
$car->stopEngine();

echo "------------Bike------------<br>";
$bike->startEngine();
$bike->stopEngine();

echo "--------ElectricCar--------<br>";
$electricCar->startEngine();
$electricCar->stopEngine();

?>