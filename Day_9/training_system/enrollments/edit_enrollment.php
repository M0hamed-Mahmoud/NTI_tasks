<?php
include '../init.php';
include '../auth/auth_check.php';

// Get the specific enrollment record to edit
$id = $_GET['id'];
$enrollment_res = mysqli_query($conn, "SELECT * FROM enrollments WHERE id = $id");
$enrollment = mysqli_fetch_assoc($enrollment_res);

// Fetch all students and courses to populate the dropdowns
$students_res = mysqli_query($conn, "SELECT id, name FROM students ORDER BY name");
$courses_res = mysqli_query($conn, "SELECT id, title FROM courses ORDER BY title");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Enrollment</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Enrollment</h3>
        <form method="POST" action="update_enrollment.php?id=<?= $id ?>" class="card p-4 shadow-sm">
            
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select name="student_id" id="student_id" class="form-control" required>
                    <option value="">-- Choose a Student --</option>
                    <?php while ($student = mysqli_fetch_assoc($students_res)): ?>
                        <option value="<?= $student['id'] ?>" <?= ($student['id'] == $enrollment['student_id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($student['name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">-- Choose a Course --</option>
                    <?php 
                    // Reset pointer and re-fetch for the second loop
                    mysqli_data_seek($courses_res, 0); 
                    while ($course = mysqli_fetch_assoc($courses_res)): ?>
                        <option value="<?= $course['id'] ?>" <?= ($course['id'] == $enrollment['course_id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($course['title']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input name="grade" type="number" step="0.1" value="<?= htmlspecialchars($enrollment['grade']) ?>" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Enrollment</button>
        </form>
    </div>
</body>
</html>