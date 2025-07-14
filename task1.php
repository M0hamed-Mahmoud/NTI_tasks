<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-success bg-gradient">

  <div class="card shadow p-4" style="max-width: 22rem;">
    <h4 class="text-center fw-semibold mb-4">User Information</h4>

    <form>
      <div class="mb-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input
          type="text"
          class="form-control"
          id="fullName"
          placeholder="ahmed mohamed abubakr"
        />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="email"
          class="form-control"
          id="email"
          placeholder="ahmedabubakr148@gmail.com"
        />
      </div>

      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input
          type="number"
          class="form-control"
          id="age"
          placeholder="1"
          min="0"
        />
      </div>

      <div class="mb-4">
        <label for="city" class="form-label">City</label>
        <input
          type="text"
          class="form-control"
          id="city"
          placeholder="sohag"
        />
      </div>

      <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
  </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>