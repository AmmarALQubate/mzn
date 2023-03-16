<!DOCTYPE html>
<html>
<head>
	<title>عرض المنتجات</title>
	<!-- استيراد Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- تخصيص أنماط CSS -->
	<style>
		h1 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
		}
		form {
			max-width: 600px;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}
		label {
			margin-right: 10px;
		}
		select, input[type="text"], input[type="submit"] {
			margin-left: 10px;
			width: 200px;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			background-color: #fff;
		}
		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			cursor: pointer;
			box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
			transition: all 0.2s ease-in-out;
		}
		input[type="submit"]:hover {
			background-color: #0069d9;
			box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.7);
		}
	</style>
	
</head>
<body>
	<h1 class="text-primary">بحث عن المنتجات</h1>
	<form method="post" action="show-products.php">
		<div class="form-group">
			<label for="category" class="text-muted">الفئة:</label>
			<select name="category" class="form-control">
				<option value="">الكل</option>
				<option value="خضروات">خضروات</option>
				<option value="فواكه">فواكه</option>
				<option value="أجبان">أجبان</option>
				<option value="لحوم">لحوم</option>
			</select>
		</div>
		<div class="form-group">
			<label for="search" class="text-muted">البحث:</label>
			<input type="text" name="search" class="form-control">
		</div>
		<input type="submit" value="بحث" class="btn btn-primary btn-lg btn-block">
	</form>

<!-- استيراد Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>