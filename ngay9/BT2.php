<?php

abstract class Animal {
  abstract public function makeSound();
}

class Cat extends Animal {
  public function makeSound() {
    echo " Meow ";
  }
}

class Dog extends Animal {
  public function makeSound() {
    echo " Bark ";
  }
}

$cat = new Cat();
$dog = new Dog();

 $cat->makeSound();
 echo "<br>";
 $dog->makeSound();


?>