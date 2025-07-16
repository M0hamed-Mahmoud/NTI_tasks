<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>نموذج تسجيل الطالب</title>

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">

        <!-- ====== FORM ====== -->
        <form class="needs-validation" novalidate>
          <h2 class="text-center mb-4">نموذج تسجيل الطالب</h2>

          <!-- الاسم -->
          <div class="mb-3">
            <label for="name" class="form-label">الاسم الكامل</label>
            <input id="name" class="form-control" type="text" placeholder="ادخل الاسم" required>
            <div class="invalid-feedback">من فضلك أدخل الاسم</div>
          </div>

          <!-- البريد -->
          <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input id="email" class="form-control" type="email" placeholder="someone@example.com" required>
            <div class="invalid-feedback">أدخل بريدًا إلكترونيًا صحيحًا</div>
          </div>

          <!-- العمر و الجنس -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="age" class="form-label">العمر</label>
              <input id="age" class="form-control" type="number" min="1" placeholder="أدخل العمر" required>
              <div class="invalid-feedback">أدخل العمر بشكل صحيح</div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">الجنس</label>
              <select id="gender" class="form-select" required>
                <option value="" selected disabled>اختر...</option>
                <option value="m">ذكر</option>
                <option value="f">أنثى</option>
              </select>
              <div class="invalid-feedback">اختر الجنس</div>
            </div>
          </div>

          <!-- الدرجة -->
          <div class="mb-3">
            <label for="mark" class="form-label">الدرجة (0‑100)</label>
            <input id="mark" class="form-control" type="number" min="0" max="100" placeholder="أدخل الدرجة" required>
            <div class="invalid-feedback">أدخل الدرجة من 0 إلى 100</div>
          </div>

          <!-- ملاحظات -->
          <div class="mb-3">
            <label for="notes" class="form-label">ملاحظات</label>
            <textarea id="notes" class="form-control" placeholder="اكتب رأيك هنا" required></textarea>
            <div class="invalid-feedback">أضف ملاحظات</div>
          </div>

          <!-- الأزرار -->
          <div class="text-center">
            <!-- زر إرسال -->
            <button class="btn btn-success me-2" type="submit">إرسال البيانات</button>

            <!-- زر عرض الطلاب (ليس submit حتى لا يُعيد تحميل الصفحة) -->
            <button class="btn btn-primary" type="button"
                    data-bs-toggle="modal" data-bs-target="#studentsModal">
              عرض الطلاب
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ====== MODAL ====== -->
  <div class="modal fade" id="studentsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content text-dark">

        <div class="modal-header">
          <h5 class="modal-title">قائمة الطلاب</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover text-center align-middle">
              <thead class="table-dark">
                <tr>
                  <th>الاسم</th>
                  <th>الدرجة</th>
                  <th>التقدير</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  // بيانات ثابتة لثلاثة طلاب
                  $students = [
                    ['name' => 'خالد',   'mark' => 95],
                    ['name' => 'علي',    'mark' => 76],
                    ['name' => 'محمد',   'mark' => 42],
                  ];

                  foreach ($students as $st) {
                    $grade = '';             // نحسب التقدير حسب الدرجة
                    if     ($st['mark'] >= 90) { $grade = 'امتياز'; }
                    elseif ($st['mark'] >= 80) { $grade = 'جيد جدًا'; }
                    elseif ($st['mark'] >= 70) { $grade = 'جيد'; }
                    elseif ($st['mark'] >= 60) { $grade = 'مقبول'; }
                    else                       { $grade = 'ضعيف'; }
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
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ====== Bootstrap JS + التحقق (نفس الكود الرسمي) ====== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (() => {           // تفعيل التحقق عند الضغط على "إرسال البيانات"
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();
  </script>
</body>
</html>
