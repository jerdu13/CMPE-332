<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant</title>
	<link rel="stylesheet" href="insert.css">
	<!-- Add icon library -->
	<script src="https://kit.fontawesome.com/db91d90783.js" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@100&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<h1>Restaurant Hub - Create Customer</h1>
<div class="search">
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
</body>
</html>