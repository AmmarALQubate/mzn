

<!DOCTYPE html>
<html>
<head>
<title>Invoices Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		#invoices-table {
			display: none;
		}
    </style>
</head>
<body>
<div class="container mt-5">
		<button id="show-invoices-btn" class="btn btn-primary mb-3" onclick="toggleTable()">Show Invoices</button>
		<table id="invoices-table" class="table">
			<thead>
				<tr>
					<th>رقم الفاتورة</th>
					<th>التاريخ</th>
					<th>الإجمالي</th>
				</tr>
			</thead>
			<tbody>
				<?php
	include ("dbconnect.php");

					// استرداد الفواتير المرتبطة بالمستخدم
			
				  $query ="SELECT i.invoice_id, i.users_id, u.username, i.invoice_date, i.total_amount
          FROM invoices i
          JOIN users u ON i.users_id = u.id
          WHERE u.id =8";
					
          $result = mysqli_query($conn, $query);
  
          // عرض البيانات في الواجهة
          while ($invoice= mysqli_fetch_assoc($result)) {

			
						echo "<tr>";
						echo "<td>".$invoice['invoice_id']."</td>";
						echo "<td>".$invoice['invoice_date']."</td>";
						echo "<td>".$invoice['total_amount']."</td>";
						echo "</tr>";
					}

			
				
				?>
			</tbody>
		</table>
	</div>

  <script>
		function toggleTable() {
			var table = document.getElementById("invoices-table");
			var btn = document.getElementById("show-invoices-btn");
			if (table.style.display === "none") {
				table.style.display = "table";
				btn.innerText = "Hide Invoices";
			} else {
				table.style.display = "none";
				btn.innerText = "Show Invoices";
			}
		}
	</script>
</body>
</html>
