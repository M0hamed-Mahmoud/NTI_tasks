<?php
class Course {
    private $title;
    private $instructor;

    function __construct($title, $instructor) {
        $this->title = $title;      
        $this->instructor = $instructor;
    }

    function describe() {
        echo "The title is: " . $this->title . ", the instructor is: " . $this->instructor;
    }
}

$course = new Course("web", "Eng AbuBakr");
$course->describe();
?>
