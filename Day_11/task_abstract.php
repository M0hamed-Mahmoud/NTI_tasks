<?php
abstract class Employee {
    public $salary;
    function __construct($salary) {
        $this->salary = $salary;
    }

    abstract public function calculateSalary() ;
}
class HourlyEmployee extends Employee {
    public $hours;
    public function __construct($hours) {
        $this->hours = $hours;
    }
    public function calculateSalary(){
       echo "your salary is : " . $this->hours * 500  ;
       

    }
}
$employee = new HourlyEmployee(30);
$employee->calculateSalary();



?>