

<!DOCTYPE html>
<html>
<head>
  <title>تحديث رصيد المستخدم</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    form {
      margin: 20px auto;
      max-width: 500px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    label {
      display: inline-block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    .message {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>تحديث رصيد المستخدم</h1>
  <form action="#" method="post">
    <label for="username">اسم المستخدم:</label>
    <input type="text" id="username" name="username">
    <label for="amount">المبلغ:</label>
    <input type="number" id="amount" name="amount" min="1">
    <input type="submit" value="تحديث" >
    </form>
    </body>
    </html>

    <?php
// افتح الاتصال بقاعدة البيانات
include ("dbconnect.php");

// تأكد من إرسال بيانات المستخدم
if (isset($_POST['username']) && isset($_POST['amount'])) {
  $username = $_POST['username'];
  $amount = $_POST['amount'];

  // استعلام SQL لتحديث رصيد المستخدم
  $sql = "UPDATE users SET account_balance = account_balance + $amount WHERE username = '$username'";
  $result = $conn->query($sql);
// جزء إعداد تقرير بالمبلغ المضاف وإجمالي الحساب
if ($result) {
    // استعلام SQL لجلب الحساب الحالي للمستخدم
    $sql = "SELECT account_balance FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
  
    // فحص نتيجة الاستعلام وعرض التقرير إذا كانت النتيجة صحيحة
    if ($result) {
      $row = $result->fetch_assoc();
      $account_balance = $row['account_balance'];
      $added_amount = $account_balance - $amount;
  
      // عرض التقرير في صفحة HTML
      echo "<h2>تقرير بالمبلغ المضاف وإجمالي الحساب</h2>";
      echo "<p>تمت إضافة المبلغ: $added_amount</p>";
      echo "<p>إجمالي الحساب: $amount</p>";
    } else {
      $message = "حدث خطأ أثناء جلب الحساب الحالي.";
      $messag = "حدث خطأ أثناء جلب الحساب الحالي.";
    }
  }}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>

<!-- زر الطباعة -->
<button onclick="printReport()">طباعة التقرير</button>

<script>
// تعريف الدالة المسؤولة عن طباعة التقرير
function printReport() {
  // افتح نافذة جديدة لطباعة التقرير
  var printWindow = window.open('', 'Print Report', 'height=400,width=600');
  // تحديد محتوى النافذة بناءً على الصفحة الحالية
  printWindow.document.write(document.documentElement.outerHTML);
  // تحديد أنماط الطباعة
  printWindow.document.head.innerHTML += '<style>@media print {button {display: none;}}</style>';
  // تفعيل زر الطباعة في النافذة الجديدة
  printWindow.print();
}
</script>
