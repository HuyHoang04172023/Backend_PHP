<?php

class Rectangle {
    public $length;
    public $width;

    function __construct($length, $width){
        $this->length = $length;
        $this->width = $width;
    }

    function get_length(){
        return $this->length;
    }
    function get_width(){
        return $this->width;
    }

    function area(){
        return $this->length*$this->width;
    }

    function perimeter(){
        return ($this->length + $this->width)*2;
    }
}

$rect = new Rectangle(5,6);

echo "Area: ".$rect->area()."<br>";
echo "Perimeter: ".$rect->perimeter()."<br>";

?>