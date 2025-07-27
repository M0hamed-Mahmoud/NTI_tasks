<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollments</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="m-0">Enrollment List</h3>
            <a href="add_enrollment.php" class="btn btn-success"> + Add Enrollment</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Course Title</th>
                    <th>Grade</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // The JOIN query to get data from three tables
                $q = "SELECT enrollments.id, students.name AS student_name, courses.title AS course_title, enrollments.grade, enrollments.enrollment_date
                      FROM enrollments
                      JOIN students ON enrollments.student_id = students.id
                      JOIN courses ON enrollments.course_id = courses.id
                      ORDER BY enrollments.enrollment_date DESC";

                $res = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>{$row['student_name']}</td>
                            <td>{$row['course_title']}</td>
                            <td>{$row['grade']}</td>
                            <td>" . date('Y-m-d', strtotime($row['enrollment_date'])) . "</td>
                            <td>
                                <a href='edit_enrollment.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_enrollment.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>