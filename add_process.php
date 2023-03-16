<!DOCTYPE html>
<html>
<head>
	<title>إضافة/تعديل المنتجات</title>
	<style>
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<h2>إضافة/تعديل المنتجات</h2>
	<form method="post" action="#">
		<label>اسم المنتج:</label>
		<input type="text" name="pro_name" required>
		<label>السعر:</label>
		<input type="number" name="price" required>
		<label>الكمية:</label>
		<input type="number" name="quantity" required>
		
		<input type="submit" name="add" value="إضافة/تعديل المنتج">
	</form>
</body>
</html>
<?php 
include ("dbconnect.php");

if(isset($_POST['add']))
{
// استلام القيم المرسلة بواسطة POST
$name = $_POST['pro_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// التحقق من تمرير البيانات بواسطة زر الإضافة
if (isset($_POST['add'])) {
    // استخدام استعلام INSERT لإضافة المنتجات إلى قاعدة البيانات
    $sql = "INSERT INTO products(name,price,quantity) VALUES ('$name','$price','$quantity')";
    if (mysqli_query($conn, $sql)) {
        echo "تم إضافة المنتج بنجاح";
    } else {
        echo "خطأ في إضافة المنتج: " . mysqli_error($conn);
    }
}

// إغلاق اتصال قاعدة البيانات
mysqli_close($conn);
}
?>
