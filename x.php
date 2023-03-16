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
  </li>
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
 
    </ul>
  </li>

  <li class="dropdown"><a href="#">ادارة المستخدمين</a><ul class="dropdown-menu">
      <li><a href="#">اضافة مستخدم جديد</a></li>
      <li><a href="#">اغلاق مستخدم</a></li>
      <li><a href="#"> تعديل مستخدمبن</a></li>
    </ul>
    </li>
    <li class="dropdown"><a href="#">الصفحة الرئيسية</a><ul class="dropdown-menu">
      <li><a title="ammar" >تواصل معنا</a></li>
  
    </ul>

    </ul>
  </nav>
</header>
</head>
<body style=" background-color: rgb(3, 126);">
<form method="post" action="#" class="form-inline">
	<div class="form-group mr-2">
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
  <button  id="buy-button" class="btn btn-lg btn-primary" style="display:none;">شراء</button>
</form>

  <?php
	// استدعاء ملف الاتصال بقاعدة البيانات
	include ("dbconnect.php");


// الحصول على القيمة المحددة من البحث والتصفية من النموذج



// استعلام SQL للحصول على المنتجات المتاحة
$sql = "SELECT * FROM products WHERE quantity > 0 ";

// إضافة فلتر إذا تم تحديده في النموذج
if(!empty($quantity)) {
    $sql .= " AND description = '".$_POST['category']."'";
}
if(!empty($search)) {
    $sql .= " AND name LIKE '%" .$_POST['search']."%'";
}

// تنفيذ الاستعلام وجلب البيانات
$result = mysqli_query($conn, $sql);
if(!$result) {
    die('Query failed: ' . mysqli_error($conn));
}


?>

<form style="direction: rtl;">
<table>
    <thead>
    
        <tr>
            <th>اسم المنتج</th>
            <th>الفئة</th>
            <th>الكمية المتاحة</th>
            <th>السعر</th>
            <th id="xxx">الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        <?php  $sql = "SELECT * FROM products WHERE quantity > 0";
        $result = mysqli_query($conn, $sql);

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
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
//===============================================================================================================
const cartItems = document.querySelector('.cart-items');
const total = document.querySelector('.total-price');
const clearCart = document.querySelector('.clear-cart');

let cart = [];

function displayCart() {
  cartItems.innerHTML = '';

  cart.forEach(item => {
    const li = document.createElement('li');
    li.innerHTML = `${item.name} <span>${item.price} ريال</span> <button class="remove-item">حذف</button>`;
    cartItems.appendChild(li);

    const removeButton = li.querySelector('.remove-item');
    removeButton.addEventListener('click', () => {
      removeItem(item);
    });
  });

  total.textContent = calculateTotal();
}

function calculateTotal() {
  let totalPrice = 0;
  cart.forEach(item => {
    totalPrice += item.price;
  });

  return totalPrice;
}

function addItem(name, price) {
  const item = { name, price };
  cart.push(item);
  displayCart();
}

function removeItem(item) {
  const index = cart.indexOf(item);
  cart.splice(index, 1);
  displayCart();
}

clearCart.addEventListener('click', () => {
  cart = [];
  displayCart();
});
//====================================================================================
$(function() {
  var totalQuantity = 0; // تعريف متغير يسمى totalQuantity ويحتوي على قيمة صفرية.

  var $buyButton = $('#buy-button'); // تعريف متغير يسمى $buyButton ويحتوي على عنصر زر الشراء الذي له معرف (id) buy-button.

  $('tr').click(function() { // تفعيل حدث النقر (click) لجميع الصفوف (tr) في الجدول.
      $(this).toggleClass('selected'); // تبديل تمييز الصف الذي تم النقر عليه (this) بإضافة أو إزالة الصفة (class) المسماة "selected".
  });

  $('.increment').click(function() { // تفعيل حدث النقر (click) لجميع العناصر التي تحتوي على الصفة (class) "increment".
      var $row = $(this).closest('tr'); // الحصول على الصف (tr) الذي يحتوي العنصر الذي تم النقر عليه (this).
      var quantity = parseInt($row.find('.quantity').text()); // الحصول على كمية العنصر التي يمثلها الصف الحالي (tr)، وتحويلها إلى رقم صحيح (integer) باستخدام parseInt.
      var maxQuantity = parseInt($row.find('.quantity').attr('data-max-quantity')); // الحصول على الكمية القصوى (maxQuantity) للعنصر الحالي من خلال الحصول على القيمة المخزنة في الخاصية (attribute) "data-max-quantity" من العنصر الذي يحتوي على الكمية (class) ".quantity".
      if (quantity < maxQuantity) { // إذا كانت الكمية الحالية أقل من الكمية القصوى.
          $row.find('.quantity').text(quantity + 1); // زيادة الكمية الحالية بمقدار واحد.
          totalQuantity++; // زيادة الكمية الإجمالية للعناصر المختارة بمقدار واحد.
      }
  });

  $('.decrement').click(function() { // تفعيل حدث النقر (click) لجميع العناصر التي تحتوي على الصفة (class) "decrement".
      var $row = $(this).closest('tr'); // الحصول على الصف (tr) الذي يحتوي العنصر الذي تم النقر عليه (this).
     
  var quantity = parseInt($row.find('.quantity').text()); // الحصول على كمية العنصر التي يمثلها الصف الحالي (tr)، وتحويلها إلى رقم صحيح (integer) باستخدام parseInt.
if (quantity > 0) { // إذا كانت الكمية الحالية أكبر من صفر.
$row.find('.quantity').text(quantity - 1); // تخفيض الكمية الحالية بمقدار واحد.
totalQuantity--; // تخفيض الكمية الإجمالية للعناصر المختارة بمقدار واحد.
}
});

  $('.add-to-cart').click(function() { // يتم تشغيل هذا الكود عند النقر فوق زر "أضف إلى السلة" باستخدام "$('.add-to-cart').click(function()"
  var $row = $(this).closest('tr'); // يتم الحصول على الصف الذي تم النقر عليه، باستخدام "$row = $(this).closest('tr')"
  var name = $row.find('td:eq(0)').text(); // يتم الحصول على اسم العنصر المضاف إلى السلة، باستخدام "$row.find('td:eq(0)').text()"
  var quantity = parseInt($row.find('.quantity').text()); // يتم الحصول على كمية العنصر المضاف إلى السلة، باستخدام "$row.find('.quantity').text()" ويتم تحويل النص إلى عدد صحيح باستخدام "parseInt()"
  var price = parseFloat($row.find('td:eq(3)').text()); // يتم الحصول على سعر العنصر المضاف إلى السلة، باستخدام "$row.find('td:eq(3)').text()" ويتم تحويل النص إلى عدد عشري باستخدام "parseFloat()"
  var total = quantity * price; // يتم حساب إجمالي السعر بضرب سعر العنصر في كميته
  var item = { // يتم إنشاء كائن للعنصر المضاف إلى السلة، باستخدام "var item = {...}"
      name: name, // يتم تحديد اسم العنصر
      quantity: quantity, // يتم تحديد كمية العنصر
      price: price, // يتم تحديد سعر العنصر
      total: total // يتم تحديد إجمالي السعر
  };
  var cart = JSON.parse(localStorage.getItem('cart')) || []; // يتم الحصول على قائمة السلة، وإذا لم يتم العثور على أي عنصر في السلة، يتم تعيينها إلى مصفوفة فارغة باستخدام "JSON.parse(localStorage.getItem('cart')) || []"
  cart.push(item); // يتم إضافة العنصر المحدد إلى السلة باستخدام "cart.push(item)"
  if(!item.quantity==0){ // يتم التحقق من أن كمية العنصر غير تساوي الصفر
      localStorage.setItem('cart', JSON.stringify(cart)); // يتم حفظ السلة المحدثة في localStorage باستخدام "localStorage.setItem('cart', JSON.stringify(cart))"
  alert('تمت الإضافة إلى السلة');
 }
  $row.removeClass('selected');
 });


setInterval(function() { // يتم تشغيل هذا الكود باستخدام "setInterval" للتحقق من كمية العناصر بانتظام
  if (totalQuantity > 0) { // إذا كانت كمية العناصر أكبر من صفر
      $buyButton.show(); // يتم عرض زر الشراء باستخدام "$buyButton.show()"
  } else { // في حال كانت كمية العناصر صفراً
      $buyButton.hide(); // يتم إخفاء زر الشراء باستخدام "$buyButton.hide()"
  }
}, 500);

buyButton.click(function() { // يتم تشغيل هذا الكود عند النقر على زر الشراء
  var cart = JSON.parse(localStorage.getItem('cart')); // يتم استدعاء عربة التسوق من ذاكرة التخزين المحلية وتخزينها في متغير "cart"

  var message = 'سلة المشتريات:\n\n'; // تم إنشاء رسالة جديدة تحتوي على رأس "سلة المشتريات:"
  var total = 0; // يتم حساب الإجمالي باستخدام متغير "total"

  // يتم تكرار العملية على كل عنصر في عربة التسوق
  cart.forEach(function(item) {
      if(!item.quantity==0){ // إذا كانت كمية العنصر ليست صفراً
          message += '- ' + item.quantity + ' × ' + item.name + ' = ' + item.total.toFixed(2) + '\n'; // تم إضافة تفاصيل العناصر في الرسالة
          total += item.total; // يتم حساب الإجمالي بإضافة سعر العنصر إلى المتغير "total"
      }
  });

  message += '\nالإجمالي: ' + total.toFixed(2) + ' ريال'; // يتم إضافة إجمالي المبلغ إلى الرسالة
  alert(message); // يتم استخدام "alert" لعرض رسالة التنبيه

  localStorage.removeItem('cart'); // يتم حذف عربة التسوق من ذاكرة التخزين المحلية
  location.reload(); // يتم إعادة تحميل الصفحة
});

});


//===========================================================================================================================
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>