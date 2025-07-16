<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class=" bg-dark">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form class="was-validated">
                    <div class=" text-white text-center" ><h1> نموذج تسجيل الطالب </h1> </div>
                    <div class="row"> 
                        <div class="mb-3 col-6">    
                            <label for="validationTextarea2" class="form-label text-white text-end d-block ">الايميل   </label>
                            <input class="form-control" id="validationTextarea2" placeholder="ادخل الايميل " type="email" required> </input>
                            <div class="invalid-feedback">
                                من فضلك ادخل الايميل  
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="validationTextarea1" class="form-label text-white text-end d-block ">اسم الطالب </label>
                            <input class="form-control" id="validationTextarea1" placeholder="ادخل اسم الطالب" type="text" required> </input>
                            <div class="invalid-feedback">
                                من فضلك ادخل الاسم  
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="validationTextarea" class="form-label text-white text-end d-block"> العمر     </label>
                            <input class="form-control" id="validationTextarea3" placeholder="ادخل  العمر " type="number" required  > </input>
                            <div class="invalid-feedback">
                                ادخل العمر بشكل صحيح               
                            </div>
                        </div>    
                        <div class="mb-3 col-4">
                            <label for="validationTextarea" class="form-label text-white text-end d-block">  الدرجة       </label>
                            <input class="form-control" id="validationTextarea4" placeholder="ادخل   الدرجة   " type="number" required min=0 max=100 > </input>
                            <div class="invalid-feedback">
                                ادخل الدرجة من 0 الي 100         
                            </div>
                        </div> 
                        <div class="mb-3 col-4">
                            <label for="validationTextarea" class="form-label text-white text-end d-block">  الجنس        </label>
                            <select class="form-control" id="validationTextarea5" placeholder="ادخل  الجنس" type="select" required > 
                                <option></option>
                                <option value="m">ذكر</option>
                                <option value="f">انثى</option>
                            </select>
                            <div class="invalid-feedback">
                                اختر الجنس          
                            </div>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label text-white text-end d-block">  ملاحظات       </label>
                        <textarea class="form-control" id="validationTextarea6" placeholder="ادخل ملاحظات" type="" required ></textarea>
                        <div class="invalid-feedback">
                            اضف ملاحظات          
                        </div>
                        
                    </div> 

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal"> عرض الطلاب   </button>
                        <button class="btn btn-success" type="submit" >ارسال البيانات  </button>
                    </div>
                    
                </form>
                

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> قائمة الطلاب  </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <table class="table table-primary">
                    <thead>
                        <tr class="table-darkا">
                        <th scope="col">الاسم</th>
                        <th scope="col">الدرجة</th>
                        <th scope="col">التقدير</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $students = [
                            ['name' => 'خالد',   'mark' => 90],
                            ['name' => 'علي',    'mark' => 72],
                            ['name' => 'محمد',   'mark' => 45],
                        ];

                        foreach ($students as $st) {
                            $grade = '';            
                            if     ($st['mark'] >= 90) { $grade = 'امتياز'; }
                            elseif ($st['mark'] >= 80) { $grade = 'جيد جدًا'; }
                            elseif ($st['mark'] >= 70) { $grade = 'جيد'; }
                            elseif ($st['mark'] >= 60) { $grade = 'مقبول'; }
                            else                       { $grade = 'راسب'; }
                            echo "<tr>
                                    <td>{$st['name']}</td>
                                    <td>{$st['mark']}</td>
                                    <td>{$grade}</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
         

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

<script src="js/bootstrap.bundle.js"> </script>
</body>
</html>