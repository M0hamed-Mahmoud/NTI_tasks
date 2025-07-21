<?php
session_start();
if (!isset($_SESSION['users'])) {
  $_SESSION['users'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    if (!empty($name) && !empty($email)) {
      $_SESSION['users'][] = [
        'name' => $name,
        'email' => $email
      ];
    }
  }


  if (isset($_POST['clear'])) {
    $_SESSION['users'] = [];
  }
  if (isset($_POST['remove_last'])) {
    if (!empty($_SESSION['users'])) {
      array_pop($_SESSION['users']);
    }
  }


  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session Manager</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />



</head>

<body class="bg-black">

  <div class="container mt-5">

    <div class="bg-dark text-light p-4 p-md-5 rounded border border-secondary" data-bs-theme="dark">


      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
          <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>


        <div class="d-grid mb-3">

          <button type="submit" name="save" class="btn btn-success fw-bold">Save</button>
        </div>
        <div class="row g-2">
          <div class="col d-grid">

            <button type="submit" name="clear" class="btn btn-danger fw-bold" formnovalidate>clear Session</button>
          </div>
          <div class="col d-grid">

            <button type="submit" name="remove_last" class="btn btn-warning fw-bold" formnovalidate>remove last</button>
          </div>
        </div>
      </form>

      <div class="results mt-4">
        <?php if (empty($_SESSION['users'])): ?>
          <div class="alert alert-danger text-center fw-bold">
            No users!
          </div>
        <?php else: ?>
          <table class="table table-dark table-bordered">
            <thead>
              <tr>
                <th>user name</th>
                <th>user email</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($_SESSION['users'] as $user): ?>
                <?php
                if (is_array($user) && isset($user['name']) && isset($user['email'])):
                  ?>
                  <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>