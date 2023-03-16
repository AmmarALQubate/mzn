<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>سلة الشراء</title>

  </head>
  <body>
    <h1>سلة الشراء</h1>
    
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

// إعداد المتغير لحساب إجمالي السعر
$total_price = 0;

// فحص نتائج الاستعلام وعرضها في جدول
if ($result->num_rows > 0) {
  echo '<table>';
  echo '<tr><th>اسم المنتج</th><th>السعر</th><th>حذف</th></tr>';
  while($row = $result->fetch_assoc()) {
    // إضافة سعر المنتج إلى إجمالي السعر
    $total_price += $row["price"];

    echo '<tr draggable="true" onmousedown="selectRow(this, event)" ondragstart="dragStart(event)" ondrop="drop(event)" ondragover="allowDrop(event)">';
    echo '<td>' . $row["name"] . '</td><td>' . $row["price"] . ' ريال</td>';
    echo '<td><button onclick="deleteRow(this)">حذف</button></td>';
    echo '</tr>';
  }
  // عرض إجمالي المنتجات
  echo '<tr><td><p>السعر الإجمالي: <span id="total-price">'.$total_price.'</span> ريال</p>
  </td></tr>';


  echo '  <tbody id="cart">
  </tbody>.</table>';
    } else {
      echo '<p>لم يتم اختيار أي منتجات</p>';
    }
  } else {
    // إذا لم يتم إرسال أي منتجات، يتم إعادة توجيه المستخدم إلى الصفحة السابقة
    header('Location: add_order_cort.php');
    exit;
  }

  // إغلاق الاتصال بقاعدة البيانات
  $conn->close();
?>
<script>
  // تعريف متغيرات الصف الحالي والصف المحدد وموقع الصف المحدد
  let currentRow = null;
  let selectedRow = null;
  let selectedRowIndex = null;

  // تحديد صف معين عند النقر عليه وتعيينه كصف محدد
  function selectRow(row, event) {
    if (event.button === 0) {
      selectedRow = row;
      selectedRowIndex = row.rowIndex;
    }
  }

  // بدء السحب عند النقر والسحب على الصف المحدد
  function dragStart(event) {
    currentRow = event.target.parentElement;
  }

  // السماح بالإفلات في أي موقع في الجدول
  function allowDrop(event) {
    event.preventDefault();
  }

  // الإفلات في مكان محدد وإزالة الصف المحدد
  function drop(event) {
    event.preventDefault();
    let destinationRow = event.target.parentElement;
    let destinationRowIndex = destinationRow.rowIndex;
    if (currentRow !== destinationRow) {
      let table = currentRow.parentElement;
      table.deleteRow(selectedRowIndex);
    }
  }

  // حذف الصف بالنقر على زر الحذف
 // حذف الصف بالنقر على زر الحذف
  function deleteRow(button) {
    let row = button.parentElement.parentElement;
    row.parentElement.removeChild(row);
  }
    function deleteRow(button) {
  var row = button.parentNode.parentNode;
  var priceCell = row.cells[1];
  var price = parseFloat(priceCell.innerText.trim().replace(' ريال', ''));
  var total = parseFloat(document.getElementById('total-price').innerText);
  total -= price;
  document.getElementById('total-price').innerText = total.toFixed(2);
  row.remove();
}

  
</script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }
    
    th {
        background-color: #4CAF50;
        color: white;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
    
   
    <p>الإجمالي: <span id="total">0</span></p>
    <button onclick="clearCart()">مسح السلة</button>
    <button onclick="checkout()">إتمام الشراء</button>
  </body>
  <script src="cart.js"></script>
</html>

</html>

