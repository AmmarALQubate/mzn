
<?php
// إذا تم إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {session_start(); // بدء Session
	$username = $_SESSION['username']; // جلب اسم المستخدم من Session
	
	// استدعاء ملف الاتصال بقاعدة البيانات
	include ("dbconnect.php");

	// جلب البيانات المدخلة
	$username = $_POST['username'];
	$password = $_POST['password'];

	// استعلام للبحث عن المستخدم في قاعدة البيانات
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	// إذا تم العثور على مستخدم يتطابق مع اسم المستخدم وكلمة المرور المدخلة
	if (mysqli_num_rows($result) == 1) {
		$row = $result->fetch_assoc();
    $_SESSION['username'] = $username;
if( $row ['level']=="boss"){
	header('Location:home3.php');
	exit();
}else if( $row ['level']=="admin"){
	header('Location:home2.php');
	exit();
}
else if( $row ['level']=="user"){
	header('Location:home1.php');
	exit(); 

}

		// يمكنك تخزين المعلومات الخاصة بالمستخدم في متغيرات أخرى هنا
	} else {
		// تعيين علامة فشل تسجيل الدخول
		echo 'فشل تسجيل الدخول، يرجى المحاولة مرة أخرى';
	}
}
?>

