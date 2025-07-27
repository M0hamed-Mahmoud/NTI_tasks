<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

// Fetch all students for the dropdown
$students_res = mysqli_query($conn, "SELECT id, name FROM students ORDER BY name");
// Fetch all courses for the dropdown
$courses_res = mysqli_query($conn, "SELECT id, title FROM courses ORDER BY title");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Enrollment</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Add New Enrollment</h3>
        <form method="POST" action="insert_enrollment.php" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="student_id" class="form-label">Select Student</label>
                <select name="student_id" id="student_id" class="form-control" required>
                    <option value="">-- Choose a Student --</option>
                    <?php while ($student = mysqli_fetch_assoc($students_res)): ?>
                        <option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="course_id" class="form-label">Select Course</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">-- Choose a Course --</option>
                    <?php while ($course = mysqli_fetch_assoc($courses_res)): ?>
                        <option value="<?= $course['id'] ?>"><?= $course['title'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input name="grade" type="number" step="0.1" placeholder="Enter grade (optional)" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Add Enrollment</button>
        </form>
    </div>
</body>
</html>