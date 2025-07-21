<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Text Analyzer</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-success bg-gradient">

  <div class="card shadow p-4" style="max-width: 22rem;">
    <h4 class="text-center fw-semibold mb-4">User Information</h4>

    <form method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Enter a sentence</label>
        <input type="text" class="form-control" id="name" name="name" required />
      </div>
      <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
  </div>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $name = $_POST['name'] ?? '';

    $length = strlen($name);
    $replaced = str_replace("bad", "***", $name);
    $firstTen = substr($name, 0, 10);
    $capitalized = ucfirst($name);
    $uppercased = strtoupper($name);

    
    $name_arr = explode(" ", $name);
  ?>


  <div class="position-absolute top-50 start-50 translate-middle mt-5" style="width: 24rem;">
    <div class="card shadow p-4">
      <h4 class="text-center fw-semibold mb-4">User Profile</h4>

      <div class="alert alert-success py-2 px-3 mb-3 text-center fw-semibold" role="alert">
        Welcome, <?= htmlspecialchars($name_arr[0]) ?>!
      </div>

      <h5 class="text-center mb-3">Text Analysis</h5>
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item"><b>Length:</b> <?= $length ?></li>
        <li class="list-group-item"><b>Replace 'bad' with '***':</b> <?= htmlspecialchars($replaced) ?></li>
        <li class="list-group-item"><b>First 10 chars:</b> <?= htmlspecialchars($firstTen) ?></li>
        <li class="list-group-item"><b>ucfirst:</b> <?= htmlspecialchars($capitalized) ?></li>
        <li class="list-group-item"><b>UPPERCASE:</b> <?= htmlspecialchars($uppercased) ?></li>
      </ul>

      <div class="text-center">
        <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-primary w-100">Back to Form</a>
      </div>
    </div>
  </div>

  <?php endif; ?>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
