<?php

class Shape {
    public function getArea() {
        return 0;
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * pow($this->radius, 2);
    }
}

$rectangle = new Rectangle(5, 10);
echo "Area rectangle: " . $rectangle->getArea() . "\n";

$circle = new Circle(7);
echo "Area circle: " . $circle->getArea() . "\n";

?>
