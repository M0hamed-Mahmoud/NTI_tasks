<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Table</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">

<?php 
$students = [
  ["Name" => "Ahmed", "Course" => "PHP", "Grade" => 75],
  ["Name" => "Ali", "Course" => "HTML", "Grade" => 89],
  ["Name" => "Mostafa", "Course" => "MySQl", "Grade" => 40],
  ["Name" => "Ziad", "Course" => "JS", "Grade" => 69]
];
?>

<div class="container">
  <div class="row">
    <table class="table table-bordered text-center mt-5">
      <thead class="table-dark">
        <tr>
          <th>Name</th>
          <th>Course</th>
          <th>Grade</th>
          <th>Status</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
    <?php 
   for ($i = 0; $i < count($students); $i++) {
        $modalId = "modal" . $i; 
        $grade = $students[$i]["Grade"];
        $status = $grade >= 60 ? "Passed" : "Failed";
        $bgColor = $grade >= 60 ? "bg-success-subtle" : "bg-danger-subtle";
        $badgeClass = $grade >= 60 ? "bg-success" : "bg-danger";
        $statusClass = $grade >= 60 ? "" : "bg-warning text-dark px-2 rounded";

        echo "<tr class='text-center'>";
        echo "<td class='$bgColor'>{$students[$i]['Name']}</td>";
        echo "<td class='$bgColor'>{$students[$i]['Course']}</td>";
        echo "<td class='$bgColor'><span class='badge $badgeClass'>{$grade}%</span></td>";
        echo "<td class='$bgColor'><span class='$statusClass'>$status</span></td>";
        echo "<td class='$bgColor'>
                <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#$modalId'>
                    View
                </button>
            </td>";
        echo "</tr>";

        echo "
        <div class='modal fade' id='$modalId' tabindex='-1' aria-labelledby='{$modalId}Label' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='{$modalId}Label'>Student Details</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body text-center'>
                        <strong>Name:</strong> {$students[$i]['Name']}<br>
                        <strong>Course:</strong> {$students[$i]['Course']}<br>
                        <strong>Grade:</strong> {$students[$i]['Grade']}%<br>
                        <strong>Status:</strong> $status
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
        ";
}
?>
    ?>
</tbody>
    </table>
  </div>
</div>

<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
