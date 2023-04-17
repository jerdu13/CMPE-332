<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>
    <link rel="stylesheet" href="orderDates.css">
    	<!-- Add icon library -->
	<script src="https://kit.fontawesome.com/db91d90783.js" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@100&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<h1>Restaurant Hub - Order Dates</h1>

<table class="orderDates">
<tr><th>Date</th><th>Number of Orders</tr>

<?php
include 'connectdb.php';
$result = $connection->query("select order_date, count(order_date) as num_orders from orders
group by order_date");

if (!$result) {
    print_r($stmt->errorInfo());
}
while ($row = $result->fetch()) {
    echo "<tr><td>".$row["order_date"]."</td>";
    echo "<td>".$row["num_orders"]."</td>";
    
}

$connection = NULL;
?>
</table>
</body>
</html>