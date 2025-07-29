<?php 
class Employee {
    public $name = "Ahmed";
    protected $salary ="30000";
    private $bonus="5000";
    public function showInfo() {
        echo " Your name is :" . $this->name;
        echo " Your salary is : " . $this->salary;
        echo " Your bonus is : " . $this->bonus;
    }
}
$employee = new Employee();
$employee->showInfo();

?>