<?php

// استدعاء ملف الاتصال بقاعدة البيانات
include ("dbconnect.php");

// التحقق من أن المستخدم هو مدير

// القيم المستلمة من نموذج إنشاء مستخدم جديد
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
// ... إلخ.
// التحقق من أن الحقول مملوءة
if (empty($username) || empty($password)) {
    echo "يرجى ملء جميع الحقول";
    exit();
}
// التحقق من وجود المستخدم في قاعدة البيانات
$sql_check = "SELECT * FROM users WHERE username = '$username'";
$result_check = mysqli_query($conn, $sql_check);

if(mysqli_num_rows($result_check) > 0) {
   echo" المستخدم موجود بالفعل في قاعدة البيانات ";
   

} else {
    // المستخدم غير موجود، لذا يجب إضافته كمستخدم جديد
    $sql = "INSERT INTO users (username, password, phone ) VALUES ('$username', '$password', '$phone')";
    if(mysqli_query($conn, $sql)) {
        echo "تم إضافة المستخدم بنجاح";
    } else {
        echo "خطأ في إضافة المستخدم: " . mysqli_error($conn);
    }
}

// إغلاق اتصال قاعدة البيانات
mysqli_close($conn);


?>


