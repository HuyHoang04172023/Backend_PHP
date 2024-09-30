<?php

interface FlowerInterface
{
    public function bloom();
    public function wither();
}

abstract class Flower implements FlowerInterface
{

    protected $nameFlower;

    public function bloom()
    {
        echo " The $this->nameFlower has bloomed.<br>";
    }
    public function wither()
    {
        echo " The $this->nameFlower has wither.<br>";
    }
}

class SunFlower extends Flower
{
    public function __construct()
    {
        $this->nameFlower = "Sun Flower";
    }
}
class Rose extends Flower
{
    public function __construct()
    {
        $this->nameFlower = "Rose";
    }
}

class Petunia extends Flower
{
    public function __construct()
    {
        $this->nameFlower = "Petunia";
        $this->color = "purple";
    }
    public function changeColor($newColor)
    {
        echo "Changing color of $this->nameFlower from $this->color to $newColor based on temperature.<br>";
        $this->color = $newColor;
    }
}

 function bloom(FlowerInterface $flower){
    $flower->bloom();
}

function wither(FlowerInterface $flower){
    $flower->wither();
}

$sunFlower = new SunFlower();
$rose = new Rose();

bloom($sunFlower);
bloom($rose);
?>