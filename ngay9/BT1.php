<?php

interface ShapeInterface {
	public function getArea();
	public function getPerimeter();
}

class Rectangle implements ShapeInterface{
	public $length;
	public $width;

	public function __construct($length, $width){
		$this->length = $length;
		$this->width = $width;
	}

	public function getArea(){
		return $this->length * $this->width;
	}

	public function getPerimeter(){
		return ($this->length + $this->width) * 2;
	}
}


class Circle implements ShapeInterface{
	public $radius;

	public function __construct($radius){
		$this->radius = $radius;
	}

	public function getArea(){
		return pi() * pow($this->radius, 2);
	}

	public function getPerimeter(){
		return 2 * pi() * $this->radius;
	}
}
$rect = new Rectangle(5,6);
$circle = new Circle(8);

echo "Area Rectangle is ". $rect->getArea()."<br>";
echo "Perimeter Rectangle is ". $rect->getPerimeter()."<br>";

echo "Area Circle is ". $circle->getArea()."<br>";
echo "Perimeter Circle is ". $circle->getPerimeter()."<br>";

?>