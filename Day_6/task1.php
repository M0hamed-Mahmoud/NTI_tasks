<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Order Summary</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-success bg-gradient">

  <div class="card shadow p-4" style="max-width: 22rem;">
    <h4 class="text-center fw-semibold mb-4">User Information</h4>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">First Number</label>
        <input type="number" class="form-control" name="firstnumber" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Second Number</label>
        <input type="number" class="form-control" name="secondnumber" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Third Number</label>
        <input type="number" class="form-control" name="thirdnumber" required />
      </div>

      <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
  </div>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    
    $first = $_POST['firstnumber'] ?? 0;
    $second = $_POST['secondnumber'] ?? 0;
    $third = $_POST['thirdnumber'] ?? 0;

   
    function total($a, $b, $c) {
      return $a + $b + $c;
    }

   
    $tax = fn() => total($first, $second, $third) * 0.2;
    $subtotal = total($first, $second, $third);
    $final = $subtotal + $tax();
  ?>

  
  <div class="position-absolute top-50 start-50 translate-middle mt-5" style="width: 22rem;">
    <div class="card shadow p-4">
      <h4 class="text-center fw-semibold mb-4">Total and Tax</h4>
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item"><b>Subtotal:</b> <?= $subtotal ?></li>
        <li class="list-group-item"><b>Tax (20%):</b> <?= $tax() ?></li>
        <li class="list-group-item"><b>Total:</b> <?= $final ?></li>
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
