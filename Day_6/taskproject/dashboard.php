<?php
$page_title = "Dashboard";
include_once('partials/header.php');
include_once('partials/navbar.php');
?>
<div class="container mt-5">
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welcome to your dashboard, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h1>
        <p class="col-md-8 fs-4">Use the navigation bar above to manage your files and view logs.</p>
      </div>
    </div>
</div>
</body>
</html>