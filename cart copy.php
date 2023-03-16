
<?php
  // افتح الاتصال بقاعدة البيانات
  include ("dbconnect.php");

  // التأكد من إرسال بيانات المنتجات المختارة
  if (isset($_POST['products'])) {
    // تحويل قيمة المصفوفة المرسلة إلى سلسلة نصية وتقسيمها باستخدام الفاصلة
    $products = implode(',', $_POST['products']);
    
    // استعلام SQL لاستعراض البيانات
    $sql = "SELECT * FROM products WHERE id IN ($products)";
    $result = $conn->query($sql);

    // فحص نتائج الاستعلام وعرضها في جدول
    if ($result->num_rows > 0) {
      echo '<table>';
      echo '<tr><th>اسم المنتج</th><th>السعر</th></tr>';
      while($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["name"] . '</td><td>' . $row["price"] . ' ريال</td></tr>';
      }
      echo '</table>';
    } else {
      echo '<p>لم يتم اختيار أي منتجات</p>';
    }
  } else {
    // إذا لم يتم إرسال أي منتجات، يتم إعادة توجيه المستخدم إلى الصفحة السابقة
    header('Location: previous_page.php');
    exit;
  }

  // إغلاق الاتصال بقاعدة البيانات
  $conn->close();
?>
