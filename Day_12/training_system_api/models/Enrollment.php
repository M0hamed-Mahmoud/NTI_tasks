<?php
class Enrollment {
    private $conn;
    private $table_name = "enrollments";

    // Object Properties
    public $id;
    public $student_id;
    public $course_id;
    public $enrollment_date;
    public $student_name; // For read operations
    public $course_title; // For read operations

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // READ enrollments with student and course names
    function read() {
        $query = "SELECT 
                    e.id, 
                    e.student_id, 
                    s.name as student_name, 
                    e.course_id, 
                    c.title as course_title, 
                    e.enrollment_date 
                  FROM " . $this->table_name . " e
                  LEFT JOIN students s ON e.student_id = s.id
                  LEFT JOIN courses c ON e.course_id = c.id
                  ORDER BY e.enrollment_date DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE enrollment
    function create() {
        $query = "INSERT INTO " . $this->table_name . " (student_id, course_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->course_id = htmlspecialchars(strip_tags($this->course_id));

        // Bind values
        $stmt->bind_param("ii", $this->student_id, $this->course_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // UPDATE enrollment
    function update() {
        $query = "UPDATE " . $this->table_name . " SET student_id = ?, course_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->course_id = htmlspecialchars(strip_tags($this->course_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bind_param("iii", $this->student_id, $this->course_id, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // DELETE enrollment
    function delete() {
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