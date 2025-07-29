<?php 
class Vechile {
    protected $make ;
    protected $model ;
    function __construct($model,$make) {
        $this->model =$model ;
        $this->make = $make;
    }
    
    function info() {
        echo $this->model ;
        echo $this->make ;

    }
}
class Car extends Vechile {
    private $fuelType ; 
      function __construct($model,$make , $fuelType) {
        $this->fuelType = $fuelType ;
        $this->model =$model ;
        $this->make = $make;
    }
    function info() {
        echo $this->model ;
        echo $this->make ;
        echo $this->fuelType ;

    }

}
$car1 = new Car("X6" , "Germany" , "gas");
$car1->info();
echo "<br>" ;
$car2 = new Vechile("X8" , "china" );
$car2->info();
?>