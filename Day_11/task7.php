<?php 
class Animal {
    public $name ;
    function makeSound(){
        echo " No sound ";
    }
}
class Dog extends Animal {
    function makeSound(){
        echo " Woof ";
    }
}
$dog = new Dog();
$dog->makeSound();


?>