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
    // Get values submitted through POST
    $name = $_POST['pro_name'];
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);

    // Validate that price and quantity are valid numbers
    if (!is_numeric($price) || !is_numeric($quantity)) {
        echo "يجب أن يحتوي السعر والكمية على قيم رقمية صالحة";
        exit();
    }

    // Use prepared statement to avoid SQL injection attacks
    $stmt = $conn->prepare("INSERT INTO products(name,price,quantity) VALUES (?,?,?)");
    $stmt->bind_param("sdd", $name, $price, $quantity);

    if ($stmt->execute()) {
        echo "تم إضافة المنتج بنجاح";
    } else {
        echo "خطأ في إضافة المنتج: " . mysqli_error($conn);
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}