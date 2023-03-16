<?php

	// استدعاء ملف الاتصال بقاعدة البيانات
	include ("dbconnect.php");

// الحصول على القيمة المحددة من البحث والتصفية من النموذج
$description = $_POST['category'];
$search = $_POST['search'];

// استعلام SQL للحصول على المنتجات المتاحة
$sql = "SELECT * FROM products WHERE quantity > 0 ";

// إضافة فلتر إذا تم تحديده في النموذج
if(!empty($quantity)) {
    $sql .= " AND description = '".$description."'";
}
if(!empty($search)) {
    $sql .= " AND name LIKE '%".$search."%'";
}

// تنفيذ الاستعلام وجلب البيانات
$result = mysqli_query($conn, $sql);
if(!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

// عرض البيانات في جدول HTML
echo "<table> <tr>  <th>اسم المنتج</th><th>الفئة</th> <th>الكمية المتاحة</th> <th>السعر</th>  </tr>";
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

