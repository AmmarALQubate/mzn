<!DOCTYPE html>
<html>
<head>
	<title>إنشاء طلب جديد</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		label {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="mt-3 mb-3">إنشاء طلب جديد</h1>

			<div class="form-group">
				<label for="name">الاسم:</label>
				<input type="text" class="form-control" name="name" required>
			</div>
			<div class="form-group">
				
			</div>
			<div class="form-group">
			</div>
			<div class="form-group">
				<label for="phone">رقم الهاتف:</label>
				
				<input type="tel" class="form-control" name="phone" required>
			</div>
			<div class="form-group">
				<label for="products">المنتجات:</label><br>
		
<?php
include("style_ty.php");
$s=10;
echo "<label>$s</label>";


include ("dbconnect.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn,$sql);


if ($result->num_rows > 0) {
  echo '<form action="cart.php"  method="POST"  >';
  echo '<table>';
  echo '<tr>
  <th>المنتج</th>
  <th>السعر</th>
  <th>اختر المنتج</th>
  </tr>';
  while($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>'.$row["name"].'</td>';
    echo '<td>'.$row["price"].' ريال</td>';
    echo '<td> <input type="checkbox" class="form-check-input" name="products[]" value="'.$row["id"].'">  </td>';
    echo '</tr>';
  }
  echo '</table>';
  echo '<button type="submit">إرسال</button>';
  echo '</form>';
  
} else {
  echo "<p>لا يوجد منتجات متاحة حاليًا</p>";
}

$conn->close();
?>


			
	
	</div>
	<!-- Bootstrap JS -->
	</body>		
			</html>
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN";
