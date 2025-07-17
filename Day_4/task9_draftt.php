<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <?php 
    $students = [
    ["Name" => "Ahmed" , "Course"=>"PHP" , "Grade" => 75],
    ["Name" => "Ali" , "Course"=>"HTML" , "Grade" => 89],
    ["Name" => "Mostafa" , "Course" => "MySQl" , "Grade" => 40],
    ["Name" => "Ziad" , "Course" => "JS" , "Grade" => 69]
    ] 
    ?>
    <div class="container">
        <div class="row ">
            <table class="table table-bordered text-center mt-5 ">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody class="text-white bg-success">
                    <?php 
                    for ($i = 0; $i < count($students); $i++) {
                        $modalId = "modal" . $i; 
                        echo "<tr>";
                        foreach ($students[$i] as $value) {
                            echo "<td>$value</td>"; }
                            if($students[$i]["Grade"] >= 60) {
                                echo " <td> passed </td> " ;
                            }
                            else echo "<td> failed </td>" ;
                            
                            

                        
                        echo "<td>
                                <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#$modalId'>
                                View
                                </button>
                            </td>";
                   
                        echo"</tr>" ;
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
                                    <strong>Course: </strong>{$students[$i]['Course']}<br>
                                    <strong>Grade:</strong> {$students[$i]['Grade']}<br>
                                    <strong>Status: </strong>" . ($students[$i]["Grade"] >= 60 ? "Passed" : "Failed") ."
                    
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
                </tbody>
                </table>
                <!-- <div class="modal fade" id="modalId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
                    <!-- <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>         
    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>