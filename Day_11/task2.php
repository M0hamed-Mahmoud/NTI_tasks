<?php
class Employee {
    public $name = 'Ahmed';
    protected $salary = '15200';
    private $bonus = '230';
    public function showInfo() {
        echo $this->name;
        echo $this->salary;
        echo $this->bonus;

    }

}
$employee = new Employee();


$employee->showInfo();
?>