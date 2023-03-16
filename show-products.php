
<div class="form-group">
            <label for="search" class="text-muted">البحث:</label>
            <input type="text" name="search" class="form-control">
        </div>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
$(document).ready(function(){
    // عند الكتابة في حقل البحث
    $("input[name='search']").keyup(function(){
        // تأخير لبضعة ثواني قبل إرسال الطلب
     
            // جمع القيم من حقول النموذج
          
            var search = $("input[name='search']").val();
            // إرسال الطلب باستخدام AJAX
            $.ajax({
                method: "POST",
                url: "#",
                data: { search: search }
            }).done(function( response ) {
                // عرض النتائج في صفحة HTML
                $("#a").html(response);
            });
       
    });
});
</script>
<?php

	// استدعاء ملف الاتصال بقاعدة البيانات
	include ("dbconnect.php");

// الحصول على القيمة المحددة من البحث والتصفية من النموذج


// استعلام SQL للحصول على المنتجات المتاحة
$sql = "SELECT * FROM products WHERE quantity > 0 ";

// إضافة فلتر إذا تم تحديده في النموذج

if(!empty($_POST['search'])) {
    $sql .= " AND name LIKE '%".$_POST['search']."%'";
}

// تنفيذ الاستعلام وجلب البيانات
$result = mysqli_query($conn, $sql);
if(!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

// عرض البيانات في جدول HTML
echo "<table id='a'> <tr>  <th>اسم المنتج</th><th>الفئة</th> <th>الكمية المتاحة</th> <th>السعر</th>  </tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['name']."</td>
            <td>".$row['description']."</td>
            <td>".$row['quantity']."</td>
                <td>".$row['price']."</td>
          </tr>";
}
echo "</table>";
?>
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

    
</body>
</html>