<?php 
class Shape {
    public function draw() {
        echo "this is a shape ";
    }
} 
class Circle extends Shape {
    public function draw() {
        echo "this is a circle ";
    }
}
class Rectangle extends Shape {
    public function draw() {
        echo "this is a rectangle";
    }
}
$shape1 = new Shape();
$shape1->draw();
echo"<br>";
$shape2 = new Circle(); 
$shape2->draw(); 
echo "<br>";
$shape3 = new Rectangle();
$shape3->draw();

?>