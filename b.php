<!DOCTYPE html>
<html lang="ar" id="a">
<head>
  <meta charset="UTF-8">
  <title>جدول الفاتورة</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f4f4;
    }
    h2 {
      color: #006600;
    }
    td {
      text-align: center;
    }
    th {
      text-align: center;
    }
    .btn-primary {
  background-color: green;
  font-family: Arial;
  font-size: 18px;
}

  </style>
</head>
<body>
  
<?php
session_start();
$to = 0;
if(isset($_POST['po_1'])) {
  $_SESSION['x'] = $_POST['po_1'];
}
$arr = $_SESSION['x'];
$username = $_SESSION['username'];
$uaccount_balance = $_SESSION['uaccount_balance'];
$arr = json_decode($arr, true);
?>

<form action="#" method="post">
  <div class="container mt-5">
    <h2 class="text-center mb-3">جدول الفاتورة</h2>
    <table class="table table-bordered" style="direction: rtl;" id="invoiceTable">
      <thead class="thead-dark">
        <tr>
          <th colspan="3" style="text-align: center;"><?php echo "<h4>" . "اسم المستخدم: " . $username . "</h4>" ?></th>
          <th><?php echo "رصيدك: " . $uaccount_balance . "ري" ?></th>
          <th><button type="submit" name="cc" class="btn btn-primary">تأكيد الشراء</button></th>
        </tr>
        <tr>
          <th scope="col">اسم المنتج</th>
          <th scope="col">الكمية</th>
          <th scope="col">السعر</th>
          <th scope="col">الإجمالي</th>
          <th scope="col"><button type="button" class="btn btn-success" onclick="confir()"> طباعة</button></th>
        </tr>
      </thead>
      <tbody>
  <?php $to = 0; foreach($arr as $item) { ?>
    <tr>
      <td><?php $name = $item['name']; echo $item['name']; $ar = array();  $ar[] = $name; ?></td>
      <td>
        <!-- زر تنقيص الكمية -->
  
        <?php $quantity = $item['quantity']; echo $quantity; ?>
        <!-- زر زيادة الكمية -->
       
      </td>
      <td><?php $price = $item['price']; echo $item['price'] . "ري "; ?></td>
      <td><?php $total = $item['total'];echo $item['total'] . "ري "; ?></td>
      <?php $to += $item['total']; ?>
      <!-- زر حذف الصنف -->
      <td><button type="button" class="btn btn-sm btn-danger" onclick="r()">حذف</button></td>
    </tr>
  <?php } ?>
  <tr>
    <td colspan="3">إجمالي الفاتورة:</td>
    <td><?php echo $to . "ري " ?></td>
  </tr>
</tbody>

  </div>
  


</form>


<?php
if(isset($_POST['cc'])) {
 
    // استدعاء ملف الاتصال بقاعدة البيانات
    include ("dbconnect.php");
    $username = $_SESSION['username'];
    $uaccount = $_SESSION['uaccount_balance'] - $to;
    $_SESSION['uaccount_balance'] = $uaccount;
//-----------------------------------------------------------------------==
    $sql = "UPDATE users SET account_balance = '$uaccount' WHERE users.username = '$username'";
    $result = mysqli_query($conn, $sql);
    $sel2 = "SELECT id FROM users WHERE username  = '$username'";
    $name3 = mysqli_query($conn, $sel2);
    $row1 = $name3->fetch_assoc();
    $userid = $row1['id']; 

  //----
  
    $count_query = "SELECT COUNT(*) as count FROM invoices  WHERE invoice_date = now() ";
    $count_result = mysqli_query($conn, $count_query);
    $count_row =$count_result->fetch_assoc();
    $count = $count_row['count'];
    $invoice_number = date("Ymd") . ($count + 1);
//----
   // تحديد التاريخ والوقت الحالي
    $ins = "INSERT INTO invoices(invoice_id, users_id, invoice_date, total_amount) 
    VALUES ('$invoice_number' ,'$userid', now(), '$to')";
  $result3 = mysqli_query($conn, $ins);

    //-----------------------------------------------------------------------==
    for ($i = 0; $i < count($arr); $i++) {
   
      $name1=$arr[$i]['name'];
      $sel = "SELECT  quantity FROM products WHERE products.name = '$name1'";
      $select = mysqli_query($conn, $sel);
      if ($select) {
        $row = $select->fetch_assoc();
        $s1 = $row['quantity'];
      $quantity1=$arr[$i]['quantity'];
       $sl_qu=  $s1-$quantity1;
       $id = "SELECT  id FROM products WHERE products.name = '$name1'";
    $id_p = mysqli_query($conn, $id);
    $row1 = $id_p->fetch_assoc();
      $id1=$row1['id'];
      $to1=$arr[$i]['total'];
     
      $up = "UPDATE products SET quantity = $sl_qu WHERE products.name = '$name1'";
      $UPDATE = mysqli_query($conn, $up);

      $in3="INSERT INTO invoice_items(invoice_id, product_id, quantity, price)
      VALUES ('$invoice_number','$id1', '$quantity1','$to1') ";
      $INSERT_in_items = mysqli_query($conn, $in3);
      //-----------------------------------------------------------------------==

     } 
  }}
  ?>
  
  


<script>
function confirmPurchase() {
  // تنفيذ العمليات اللازمة لإكمال الشراء هنا
  // يمكن استدعاء دالة الـ ajax لإرسال البيانات إلى الخادم

  // إنشاء تقرير الشراء
  var reportWindow = window.open();
  reportWindow.document.write('<html><head><title>تقرير الشراء</title></head><body>');
  reportWindow.document.write(document.getElementById('a').outerHTML);
  reportWindow.document.write('</body></html>');
  reportWindow.document.close();
  reportWindow.print();
}
</script>

  

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>



<script>
  function r() {
    // حذف صف الجدول المحدد
    event.target.closest("tr").remove();
  }

</script>
