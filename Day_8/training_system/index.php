<?php include 'db/db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class ="card-shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"> Student</h5>
                        <?php
                        $count= mysqli_fetch_assoc(mysqli_query($conn , "SELECT COUNT(*) AS total FROM students "));
                        echo" <p class='card-text'> Total courses : <strong> {$count['total']} </strong></p>";

                        ?>
                        <a href="./students/students.php" class="btn btn-primary"> View Students</a>

                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class ="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"> Course</h5>
                        <?php
                        $count= mysqli_fetch_assoc(mysqli_query($conn , "SELECT COUNT(*) AS total FROM courses "));
                        echo" <p class='card-text'> Total courses : <strong> {$count['total']} </strong></p>";

                        ?>
                        <a href="./courses/courses.php" class="btn btn-primary"> View Courses</a>

                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class ="card-shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"> Enrollments</h5>
                        <?php
                        $count= mysqli_fetch_assoc(mysqli_query($conn , "SELECT COUNT(*) AS total FROM enrollments "));
                        echo" <p class='card-text'> Total courses : <strong> {$count['total']} </strong></p>";

                        ?>
                        <a href="./enrollments/enrollments.php" class="btn btn-primary"> View Enrollments</a>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    
</body>
</html>