<!-- NO PHP INCLUDES NEEDED AT THE TOP -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Use the BASE_URL constant for all links -->
        <a class="navbar-brand" href="<?= BASE_URL ?>index.php">Training System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link" href="<?= BASE_URL ?>students/students.php">Students</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= BASE_URL ?>courses/courses.php">Courses</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= BASE_URL ?>enrollments/enrollments.php">Enrollments</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                    <a class="nav-link" href="#">Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?> (<?= htmlspecialchars(ucfirst($_SESSION['user_role'])); ?>)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>