<!DOCTYPE html>
<html>
<body>
<h1>Restaurant Hub - Schedule</h1>
	
<?php
include "connectdb.php";
$name = $_POST["employees"];

$query = "select service as role, day, start_time, end_time
          from service_shift
          where id = (select emp_id from service where fname = :fname)
          and day not in('saturday', 'sunday')
          union
          select 'delivery' as role, day, start_time, end_time
          from delivery_shift
          where id = (select emp_id from delivery where fname = :fname)
          and day not in ('saturday', 'sunday)
          union
          select 'chef' as role, day, start_time, end_time,
          from chef_shift
          where id = (select emp_id from chef where fname = :fname)
          and day not in ('saturday', 'sunday')
          union
          select 'management' as role, day, start_time, end_time
          from management_shift
          where id = (select emp_id from management where fname = :fname)
          and day not in ('saturday', 'sunday')";

$stmt = $connection->prepare($query);
$stmt->bindParam(':name', $empName);
$result = $stmt->execute();

while($row = $stmt->fetch()){
    echo "<tr><td>".$row["day"]."</td>";
    echo "<td>"." ".$row["start_time"]."</td>";
    echo "<td>".$row["end_time"]."</td></tr>";
}
$connection = NULL;

?>
</body>
</html>