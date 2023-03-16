<!DOCTYPE html>
<html>
<head>
	<title>إضافة مستخدم جديد</title>
	<!-- تضمين Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- تنسيق CSS الخاص بالصفحة -->
	<style>
		body {
			background-color: #f5f5f5;
			padding: 20px;
		}
		h1 {
			color: #333;
			font-size: 36px;
			font-weight: bold;
			margin-bottom: 30px;
			text-align: center;
			text-transform: uppercase;
		}
		form {
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			padding: 30px;
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			color: #333;
			display: block;
			font-size: 16px;
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type="text"],
		input[type="password"] {
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			padding: 10px;
			width: 100%;
		}
		input[type="submit"] {
			background-color: #007bff;
			border: none;
			border-radius: 4px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px 20px;
			margin-top: 20px;
		}
		input[type="submit"]:hover {
			background-color: #0069d9;
		}
	</style>
</head>
<body>
	<h1>إضافة مستخدم جديد</h1>


	
	<form action="add_us.php" method="post">
		<div class="form-group">
			<label for="username">اسم المستخدم:</label>
			<input type="text" name="username" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="ph">رقم المستخدم:</label>
			<input type="text" name="ph" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="password">كلمة المرور:</label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<input type="submit" value="إضافة المستخدم" class="btn btn-primary">
	</form>








	<!-- تضمين ملفات jQuery و Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
