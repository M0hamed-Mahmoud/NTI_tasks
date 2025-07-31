<?php
class Student {
    private $conn;
    private $table_name = "students";

    // Object Properties
    public $id;
    public $name;
    public $email;
    public $phone;

    // Constructor with database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // READ all students
    function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // READ one student by ID
    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        
        $result = $stmt->get_result()->fetch_assoc();

        // Set properties if a result is found
        if ($result) {
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
        }
    }

    // CREATE student
    function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        // Bind values
        $stmt->bind_param("sss", $this->name, $this->email, $this->phone);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // UPDATE student
    function update() {
        $query = "UPDATE " . $this->table_name . " SET name = ?, email = ?, phone = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bind_param("sssi", $this->name, $this->email, $this->phone, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // DELETE student
    function delete() {
        // Since enrollments table has ON DELETE CASCADE, enrollments will be deleted automatically.
        // If it didn't, you would first delete enrollments like this:
        // $enrollment_query = "DELETE FROM enrollments WHERE student_id = ?";
        // ... execute that query ...

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