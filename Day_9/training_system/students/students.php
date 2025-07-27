<<?php
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
        <title>Document</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>

    <body class="bg-light">
        <?php include '../navbar.php'; ?>
        <div class="container mt-4">
            <h3 class="mb-3"> Student List</h3>
            <a href="add_student.php" class="btn btn-success mb-3"> +ADD Student</a>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>DOB</th>
                        <th>Actions</th>

                    </tr>

                </thead>
                <tbody>
                    <?php
                    $q = " SELECT * FROM students ";
                    $res = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_assoc($res)) {
                        // Here is the corrected code block
                        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['phone']) . "</td>
                <td>" . htmlspecialchars($row['date_of_birth']) . "</td>
                <td>
                    <!-- FIX: Added 'btn-warning' class and the missing closing quote for href -->
                    <a href='edit_student.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>

                    <!-- FIX: Added 'btn-danger' class and a confirmation dialog -->
                    <a href='delete_student.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a>
                </td>
            </tr>";
                    }
                    ?>
                </tbody>

            </table>



        </div>


    </body>

    </html>