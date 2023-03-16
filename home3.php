<?php  session_start();
	 // بدء Session
	$username = $_SESSION['username'];
  $_SESSION['uaccount_balance'];
  ?>
<!DOCTYPE html>
<html lang="er">

<header>
  <div class="logo">
    <a href="#"><img src="maz.png" alt="Supermarket Logo"></a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="cort.js">
  <link rel="stylesheet" href="style_h.css">
  <link rel="stylesheet" href="styleh3.css">
  </div>
  <nav>
  <ul>
      <ul class="menu">

  <li><a href="index1.php">خروج</a></li>
</ul>
  </li>
  <li class="dropdown"><a href="#">ادراة الطلبيات</a><ul class="dropdown-menu">
      <li><a href="order_min.php"> طلبات المستخدمين</a></li>
    </ul></li>

  <li class="dropdown"><a href="#">ادارة المخزون</a> <ul class="dropdown-menu">
      <li><a href="add_process.php">اضافة صنف</a></li>
      <li><a href="add_process.php">تعديل صنف</a></li>
      <li><a href="add_process.php">حذف صنف</a></li>
    </ul>
  </li>

  <li class="dropdown"><a href="#">ادارةالتقارير</a> <ul class="dropdown-menu">
  <li><a href="#"> تقارير المستخدمين</a></li>
      <li><a href="report.php">تقارير الاصناف </a></li>
      <li><a href="report.php">تقارير المبيعات </a></li>
      <li><a href="report.php">تقارير الطلبيات </a></li>

      </ul>
    </li>

  <li class="dropdown"><a href="#">ادارة الحسابات</a><ul class="dropdown-menu">
      <li><a href="add_acc.php"> تغذي الحسابات</a></li>
      
      <li><a title="رصيدي" > <?php
  //اضهار الرصيد
$uaccount_balance;
include ("dbconnect.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  $row = $result->fetch_assoc();
$uaccount_balance = $row ['account_balance'];
$_SESSION['uaccount_balance']=$uaccount_balance;
} echo "رصيدك : " ."   ".$uaccount_balance."    " ."ريال";?>  </a></li>
   
    
    </ul>
  </li>

  <li class="dropdown"><a href="#">ادارة المستخدمين</a><ul class="dropdown-menu">
      <li><a href="#">اضافة مستخدم جديد</a></li>
      <li><a href="#">اغلاق مستخدم</a></li>
      <li><a href="#"> تعديل مستخدمبن</a></li>
    </ul>
    </li>
    <li class="dropdown"><a href="#"><?php
   echo " مرحبًا : " .$username ; ?></a>
  </nav>
</header>
</head>
<body style=" background-color: rgb(3, 126);">
<div class="form-inline"><style>
header {
  background-color: #fff;
  height: 80px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.logo img {
  height: 60px;
}

nav ul {
  list-style: none;
  display: flex;
}

nav li {
  margin: 0 20px;
}

nav a {
  text-decoration: none;
  color: #555;
  font-weight: bold;
  text-transform: uppercase;
}

.dropdown {
  position: relative;
}

.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  padding: 0;
  list-style: none;
  margin: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown:hover .dropdown-menu {
  display: block;
}

.dropdown-menu li a {
  display: block;
  color: #333;
  text-decoration: none;
  padding: 10px;
}

.dropdown-menu li:hover {
  background-color: #f5f5f5;
}

form {
  direction: rtl;
}

tr:hover {
    background-color: lightgray;
}
td {
  text-align: center;
}

</style>
</head>

<link rel="stylesheet" href="styleh3.css">
</head>
<body style=" background-color: rgb(3, 126);">

<div class="form-inline" style="direction: rtl;" >

	<div class="form-group mr-2">
    <form action="#" method="post">
		<label for="category" class="text-muted mr-2">الفئة:</label>
		<select name="category" class="form-control">
			<option value="">الكل</option>
			<option value="خضروات">خضروات</option>
			<option value="فواكه">فواكه</option>
			<option value="أجبان">أجبان</option>
			<option value="لحوم">لحوم</option>
		</select>
	</div>
	<div class="form-group mr-2">
		<label for="search" class="text-muted mr-2">البحث:</label>
		<input type="text" name="search" class="form-control">
    </div>
	<input type="submit"  name="s" value="بحث" class="btn btn-primary btn-lg">
  </form>
<button  id="buy-button" class="btn btn-lg btn-primary" style="display:none;"> عرض الفاتورة</button>
  <button onclick="x()" class="btn btn-lg btn-primary" style="display:none"; id="buy-button2" >شراء</button>
  

</div>


  <?php

    $i=1;
	// استدعاء ملف الاتصال بقاعدة البيانات
	include ("dbconnect.php");
if (isset($_POST['s']))
{
// الحصول على القيمة المحددة من البحث والتصفية من النموذج
$description = $_POST['category'];
$search = $_POST['search'];
}
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

?>



<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    form {
  direction: rtl;
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
    td {
  text-align: center;
}

</style>
<div style="direction: rtl;">
<table>
    <thead>
    
        <tr>
            <th>اسم المنتج</th>
            <th>الفئة</th>
            <th>الكمية المتاحة</th>
            <th>السعر</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
      
        <?php 
        if($i==0){
        $sql = "SELECT * FROM products";
        $result= mysqli_query($conn, $sql);}
         while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <button class="btn btn-sm btn-success increment">+</button>
                    <span class="quantity" data-max-quantity="<?php echo $row['quantity']; ?>">0</span>
                    <button class="btn btn-sm btn-danger decrement">-</button>
                    <button class="btn btn-sm btn-primary add-to-cart">إضافة إلى السلة</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
<script> 

 </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() { 
  var y=0;
 window.myVariable=y;
 var v=0;
    var totalQuantity = 0;
    var $buyButton = $('#buy-button');
    var $buyButton2 = $('#buy-button2');
    $('tr').click(function() {
        $(this).toggleClass('selected');
    });

    $('.increment').click(function() {
        var $row = $(this).closest('tr');
        var quantity = parseInt($row.find('.quantity').text());
        var maxQuantity = parseInt($row.find('.quantity').attr('data-max-quantity'));
        if (quantity < maxQuantity) {
            $row.find('.quantity').text(quantity + 1);
            totalQuantity++;
        }
    });

    $('.decrement').click(function() {
        var $row = $(this).closest('tr');
        var quantity = parseInt($row.find('.quantity').text());
        if (quantity > 0) {
            $row.find('.quantity').text(quantity - 1);
            totalQuantity--;
        }
    });

    $('.add-to-cart').click(function() {
        var $row = $(this).closest('tr');
        var name = $row.find('td:eq(0)').text();
        var quantity = parseInt($row.find('.quantity').text());
        var price = parseFloat($row.find('td:eq(3)').text());
        var total = quantity * price;
        var item = {
            name: name,
            quantity: quantity,
             price: price,
             total: total
};
var cart = JSON.parse(localStorage.getItem('cart')) || [];
cart.push(item);
if(!item.quantity==0){
localStorage.setItem('cart', JSON.stringify(cart));
alert('تمت الإضافة إلى السلة');
v++;
}
$row.removeClass('selected');
});


setInterval(function() {
    if (totalQuantity > 0 )
     {if(v>0)
        $buyButton.show();
        if(y>0)
        $buyButton2.show();
       ;
    } else {
        $buyButton.hide();
      
    }
}, 500);




$buyButton.click(function() {
    var cart = JSON.parse(localStorage.getItem('cart'));
    var message = 'سلة المشتريات:\n\n';
    var total = 0;
    cart.forEach(function(item) {
      if(!item.quantity==0){
        message += '\n' + item.quantity + ' × ' + item.name + ' = ' + item.total.toFixed(2) + '\n';
        total += item.total;}
    });
    message += '\nالإجمالي: ' + total.toFixed(2) + ' ريال';
    message+='\n\n';
    if (confirm(message+'هل أنت متأكد من الشراء؟')) {
  // الكود الخاص بالتأكيد على الشراء

 


    $.ajax({
      type: "POST",
      url: "b.php",
      data: { po_1: JSON.stringify(cart) }
    });

    
   
    localStorage.removeItem('cart');
 
    window.location.href = "b.php"; // تحويل المستخدم إلى الصفحة b.php
  }
});

});

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>