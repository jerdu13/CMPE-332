<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>
    <link rel="stylesheet" href="orders.css">
    	<!-- Add icon library -->
	<script src="https://kit.fontawesome.com/db91d90783.js" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@100&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div class="content">      
    <h1>Restaurant Hub - Orders</h1>
    <div class="search">
        <form action="orders.php" method="POST">
			<label for="chef">Order Date:</label>
			<input type="text" id="date" name="orders"/>
			<input type="submit" value="Search"/>
		</form>
    </div>
    <table class="order">
    <tr><th>Customer</th><th>Items</th><th>Total</th><th>   Tip Amount</th><th>Delivered By</th></tr>

    <?php
    include 'connectdb.php';
    $date = $_POST["orders"];

    $query = "select c.fname, c.lname, GROUP_CONCAT(oi.food_name SEPARATOR ', ') as items_ordered, o.price, o.tip, d.fname as dfname, d.lname as dlname
    from orders o join customer c on o.customer_id = c.email
    join order_items oi on o.order_id = oi.order_id
    join delivery d on o.delivery_id = d.emp_id
    where o.order_date = :date
    group by o.order_id";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':date', $date);
    $result = $stmt->execute();
    if (!$result) {
        print_r($stmt->errorInfo());
    }
    while ($row = $stmt->fetch()) {
        echo "<tr><td>".$row["fname"]. " ".$row["lname"]."</td>";
        echo "<td>"." ".$row["items_ordered"]."</td><td>".$row["price"]."</td>";
        echo "<td>".$row["tip"]."</td>";
        echo "<td>".$row["dfname"]." ".$row["dlname"]."</td></tr>";
        
    }
    $connection = NULL;
    ?>
    </table>
</div>
</body>
</html>