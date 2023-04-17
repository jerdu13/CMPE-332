<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant</title>
	<link rel="stylesheet" href="createCustomer.css">
	<!-- Add icon library -->
	<script src="https://kit.fontawesome.com/db91d90783.js" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@100&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="search">
        <h1>Restaurant Hub - Create Customer</h1>
            <form action="createCustomer.php" method="POST">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"/><br>
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone"/><br>
                <label for="city">City:</label>
                <input type="text" id="city" name="city"/><br>
                <label for="street">Street:</label>
                <input type="text" id="street" name="street"/><br>
                <label for="postal">Postal Code:</label>
                <input type="text" id="postal" name="postal"/><br>
                <label for="first">First Name:</label>
                <input type="text" id="first" name="first"/><br>
                <label for="last">Last Name:</label>
                <input type="text" id="last" name="last"/><br>
                <input type="submit" value="Search"/>
            </form>
    </div>

<?php
$email = $_POST["email"];
$phoneNum = $_POST["phone"];
$city = $_POST["city"];
$street = $_POST["street"];
$postal = $_POST["postal"];
$credit = '5.00';
$fname = $_POST["first"];
$lname = $_POST["last"];

include 'connectdb.php';

$query = "insert into customer values (:email, :phoneNum, :city, :street, :postal, :credit, :fname, :lname)";
$stmt = $connection->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phoneNum', $phoneNum);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':street', $street);
$stmt->bindParam(':postal', $postal);
$stmt->bindParam(':credit', $credit);
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$result = $stmt->execute();

if ($result == true) {
	echo "<h3>Insert Successful.</h3>";
}
else {
	echo "<h3>Failed insertion</h3>";
}

$connection = NULL;

?>
</body>
</html>