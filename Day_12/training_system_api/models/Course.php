<?php
class Course {
    private $conn;
    private $table_name = "courses";

    // Object Properties
    public $id;
    public $title;
    public $description;
    public $hours;
    public $price;

    // Constructor with database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // READ all courses
    function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY title";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // READ one course by ID
    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        
        $result = $stmt->get_result()->fetch_assoc();

        // Set properties
        $this->title = $result['title'];
        $this->description = $result['description'];
        $this->hours = $result['hours'];
        $this->price = $result['price'];
    }

    // CREATE course
    function create() {
        $query = "INSERT INTO " . $this->table_name . " (title, description, hours, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        // Sanitize data (important for security)
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->hours = htmlspecialchars(strip_tags($this->hours));
        $this->price = htmlspecialchars(strip_tags($this->price));

        // Bind values
        $stmt->bind_param("ssdd", $this->title, $this->description, $this->hours, $this->price);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // UPDATE course
    function update() {
        $query = "UPDATE " . $this->table_name . " SET title = ?, description = ?, hours = ?, price = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->hours = htmlspecialchars(strip_tags($this->hours));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bind_param("ssddi", $this->title, $this->description, $this->hours, $this->price, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // DELETE course
    function delete() {
        // First delete enrollments to avoid foreign key errors
        $enrollment_query = "DELETE FROM enrollments WHERE course_id = ?";
        $enrollment_stmt = $this->conn->prepare($enrollment_query);
        $enrollment_stmt->bind_param("i", $this->id);
        $enrollment_stmt->execute();

        // Now delete the course
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>