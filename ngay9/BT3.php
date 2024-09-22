<?php

interface VehicleInterface {
    public function startEngine();
    public function stopEngine();
}

class Car implements VehicleInterface {
    public static $vehicleType = "Car";
    
    public function startEngine() {
        echo "Car engine started.<br>";
    }
    
    public function stopEngine() {
        echo "Car engine stopped.<br>";
    }

    public static function getVehicleType() {
        return self::$vehicleType;
    }
}

class Bike implements VehicleInterface {
    public static $vehicleType = "Bike";
    
    public function startEngine() {
        echo "Bike engine started.<br>";
    }
    
    public function stopEngine() {
        echo "Bike engine stopped.<br>";
    }

    public static function getVehicleType() {
        return self::$vehicleType;
    }
}

class ElectricCar extends Car {
    public static $vehicleType = "Electric Car";

    public function startEngine() {
        echo "Electric car engine started silently.<br>";
    }

    public function stopEngine() {
        echo "Electric car engine stopped.<br>";
    }

    public static function getVehicleType() {
        return self::$vehicleType;
    }
}

function startVehicle(VehicleInterface $vehicle) {
    $vehicle->startEngine();
}

function stopVehicle(VehicleInterface $vehicle) {
    $vehicle->stopEngine();
}

$car = new Car();
$bike = new Bike();
$electricCar = new ElectricCar();

echo "Vehicle type: " . Car::getVehicleType() . "<br>";      
echo "Vehicle type: " . Bike::getVehicleType() . "<br>";   
echo "Vehicle type: " . ElectricCar::getVehicleType() . "<br>"; 

startVehicle($car);          
stopVehicle($car);          

startVehicle($bike);         
stopVehicle($bike);            

startVehicle($electricCar);    
stopVehicle($electricCar);     

?>
