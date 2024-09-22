<?php

abstract class Animal {
  abstract public function makeSound();
}

class Cat extends Animal {
  public function makeSound() {
    return " Meow ";
  }
}

class Dog extends Animal {
  public function makeSound() {
    return " Bark ";
  }
}

$cat = new Cat();
$dog = new Dog();

 echo "Cat sound: ". $cat->makeSound();
 echo "<br>";
 echo "Dog sound: ".$dog->makeSound();


?>