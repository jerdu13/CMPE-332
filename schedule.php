<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>
    <link rel="stylesheet" href="schedule.css">
    	<!-- Add icon library -->
	<script src="https://kit.fontawesome.com/db91d90783.js" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@100&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
   <h1>Radio Buttons</h1>
   
   <form action="getSchedule.php" method="post"> 
   
<?php
   include 'connectdb.php';
   $query ="select service as role, day, start_time, end_time
            from service_shift
            where id = (select emp_id from service where fname = :fname)
            and day not in('saturday', 'sunday')
            union
            select 'delivery' as role, day, start_time, end_time
            from delivery_shift
            where id = (select emp_id from delivery where fname = :fname)
            and day not in ('saturday', 'sunday)
            union
            select 'chef' as role, day, start_time, end_time
            from chef_shift
            where id = (select emp_id from chef where fname = :fname)
            and day not in ('saturday', 'sunday')
            union
            select 'management' as role, day, start_time, end_time
            from management_shift
            where id = (select emp_id from management where fname = :fname)
            and day not in ('saturday', 'sunday')";


   $result = $connection->query($query);
   echo "Who are you looking up? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="employees" value="' . $row["role"] . '"> ' . $row["role"] . ' <br>';
   }
   $connection = NULL;
?>
   <input type="submit" value = "Choose Instructor">
   </form> 
   
</body>
</html>