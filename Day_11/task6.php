<?php 
class Course {
    public $title;
    public $constructor;
    public function __construct($title, $constructor) {
        $this->title = $title;
        $this->constructor = $constructor;
    }
    function describe() {
        echo "the cousre title is : " . $this->title;
        echo " the cousre constructor is : " . $this->constructor;
    }   
}
$course = new Course("Web" , "Eng Abu Bakr");
$course->describe();

?>