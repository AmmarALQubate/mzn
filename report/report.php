<!DOCTYPE html>
<html>
<head>
    <title>تقارير المبيعات</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-4">تقارير المبيعات</h1>

    <?php
    // Import database configuration
    include ("dbconnect.php");

    // Check for errors
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute query to get daily sales report using prepared statement
    $stmt = $conn->prepare("SELECT i.invoice_date AS 'تاريخ الفاتورة', 
            SUM(ii.quantity) AS 'إجمالي الكمية المباعة', 
            SUM(ii.price * ii.quantity) AS 'إجمالي قيمة المبيعات' 
            FROM invoices i 
            JOIN invoice_items ii ON i.invoice_id = ii.invoice_id 
            WHERE i.invoice_date = NOW()  GROUP BY i.invoice_date");
    $stmt->execute();

    // Check for errors and output query result in a Bootstrap table
    if ($stmt->error) {
      echo "<div class='alert alert-danger'>Error retrieving sales report: " . $stmt->error . "</div>";
    } else {
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        // Output data as Bootstrap table
        echo "<table class='table'><thead><tr><th>تاريخ الفاتورة</th><th>إجمالي الكمية المباعة</th><th>إجمالي قيمة المبيعات</th></tr></thead><tbody>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["تاريخ الفاتورة"]."</td><td>".$row["إجمالي الكمية المباعة"]."</td><td>".$row["إجمالي قيمة المبيعات"]."</td></tr>";
        }
        echo "</tbody></table>";
      } else {
        echo "<div class='alert alert-warning'>لا توجد بيانات</div>";
      }
    }

    // Close database connection
    $stmt->close();
    $conn->close();
    ?>

</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>