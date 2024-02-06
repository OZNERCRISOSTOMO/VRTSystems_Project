<?php
include_once('test.php'); 

$query = "SELECT * FROM attendance";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

function calculateTotalHours($timeIn, $timeOut) {
    // Convert the time strings to DateTime objects
    $timeIn = new DateTime($timeIn);
    $timeOut = new DateTime($timeOut);

    // Calculate the difference between Time Out and Time In
    $interval = $timeIn->diff($timeOut);

    // Format and return the difference as total hours and minutes
    return $interval->format('%H hours %i minutes');
}
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
		<tr> 
			<th colspan="5"><h2>Attendance Record</h2></th> 
		</tr> 
		<tr>
			<th>ID</th>
			<th>Employee ID</th>
			<th>First Name</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Total Hours</th>
		</tr> 

		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $row['id']; ?></td> 
				<td><?php echo $row['employee_id']; ?></td> 
				<td><?php echo $row['first_name']; ?></td> 
				<td><?php echo $row['time_in']; ?></td> 
				<td><?php echo $row['time_out']; ?></td> 
				<td><?php echo calculateTotalHours($row['time_in'], $row['time_out']); ?></td> 
			</tr> 
		<?php } ?>

	</table> 
	</body> 
</html>
