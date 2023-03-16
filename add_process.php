<!DOCTYPE html>
<html lang="er">

<head>
    <meta charset="UTF-8">
    <title>إضافة صنف</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNVQ8ew" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
	
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="name">اسم الصنف:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">وصف الصنف:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">السعر:</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="quantity">الكمية:</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="supplier">المورد:</label>
                        <input type="text" class="form-control" id="supplier" name="supplier">
                    </div>
                    <div class="form-group">
                        <label for="date">تاريخ الشراء:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">تاريخ الانتهاء:</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                    </div>
                    <div class="form-group">
                        <label for="unit">وحدة القياس:</label>
                        <select class="form-control" id="unit" name="unit">
                            <option value="كيلو">كيلو</option>
                            <option value="كيس">كيس</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="min_stock">الحد الأدنى من الكمية:</label>
                        <input type="text" class="form-control" id="min_stock" name="min_stock">
                    </div>
                    <div class="form-group">
                        <label for="max_stock">الحد الأقصى من الكمية:</label>
                        <input type="text" class="form-control" id="max_stock" name="max_stock">
                    </div>
                    <div class="form-group">
                        <label for="notes">ملاحظات:</label>
                        <textarea class="form-control" id="notes" name="notes"></textarea>
                    </div>
                    <button name="add" type="submit" class="btn btn-primary">إضافة الصنف</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
    <div class="col-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>اسم الصنف</th>
                    <th>وصف الصنف</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>المورد</th>
                    <th>تاريخ الشراء</th>
                    <th>تاريخ الانتهاء</th>
                    <th>وحدة القياس</th>
                    <th>الحد الأدنى من الكمية</th>
                    <th>الحد الأقصى من الكمية</th>
                    <th>ملاحظات</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include ("dbconnect.php");
                    $sql = "SELECT * FROM products";
                    $result= mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)): 
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['supplier']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['expiry_date']; ?></td>
                    <td><?php echo $row['unit']; ?></td>
                    <td><?php echo $row['min_stock']; ?></td>
                    <td><?php echo $row['max_stock']; ?></td>
                    <td><?php echo $row['notes']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .table th {
        text-align: center;
        background-color: #ccc;
    }

    .table td {
        vertical-align: middle;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-hover tbody tr:hover {
        background-color: #ddd;
    }
</style>
</body>



</html>
<?php 
include("dbconnect.php");

if(isset($_POST['add'])) {

  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $supplier = $_POST['supplier'];
  $date = $_POST['date'];
  $expiry_date = $_POST['expiry_date'];
  $unit = $_POST['unit'];
  $min_stock = $_POST['min_stock'];
  $max_stock = $_POST['max_stock'];
  $notes = $_POST['notes'];

  // prepare and bind the insert statement
  $stmt = $conn->prepare("INSERT INTO products(name, description, price, quantity, supplier, date, expiry_date, unit, min_stock, max_stock, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdiissssii", $name, $description, $price, $quantity, $supplier, $date, $expiry_date, $unit, $min_stock, $max_stock, $notes);

  // execute the statement
  if ($stmt->execute()) {
    echo "تم إضافة المنتج بنجاح";
  } else {
    echo "خطأ في إضافة المنتج: " . $stmt->error;
  }

  // close the prepared statement and the database connection
  $stmt->close();
  mysqli_close($conn);
}