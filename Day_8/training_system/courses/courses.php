<?php include '../db/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Course List</h3>
        <a href="add_course.php" class="btn btn-success mb-3">+ Add Course</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $res = mysqli_query($conn, "SELECT * FROM courses");
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>
                            <td>{$row['title']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['hours']}</td>
                            <td>{$row['price']}</td>
                            <td>
                                <a href='edit_course.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_course.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
