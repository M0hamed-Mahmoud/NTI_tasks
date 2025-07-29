<?php 
class Book {
    private $title;
    function __construct($title) {
        $this->title = $title;
    }
    function read() {
        echo "the book title is : " . $this->title;
    }
}
$book = new Book("Harry poter");
$book->read();




?>