<?php
class Book{
    public $title;
    public function read(){ 
        echo "Ahmed is reading $this->title" ; 
    }

} 
$book = new Book();
$book->title = "book title";
$book->read();

?>