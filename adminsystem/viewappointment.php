<?php
session_start(); 

$_SESSION['userid'];
?>
<!doctype html>
<html lang=en>
<head>
<title>View dentist </title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="viewappointment.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>

<br><br><br>&nbsp
<div align="left">

	<a href="http://localhost/dental/adminsystem/index1.html"  class="col head" >Back</a>
	
	
	</div>
	
<div align="right">

	<a href="index.html"  class="col head" >Logout</a>
	
	
	</div>




	<img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">Dental Clinic</p>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">See Appointment</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
// Make the query: 

$q = "SELECT userid ,code,clinic,dentist,regdate,regtime,status FROM appointement  WHERE userid=".$_SESSION['userid']." ";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Dental Procedure</b></td><td class="col head"><b>Dentist</b></td><td class="col head"><b>Clinic</b></td>
				<td class="col head"><b>Appointment Date</b></td>
				<td class="col head"><b>Appointment Time</b></td>
				<td class=" last"><b>Status</b></td>
				
				</tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['code'] . '</td>
				<td class="col">' . $row['dentist'] .'</td>
				<td class="col">' . $row['clinic'] .'</td>
				<td class="col">' . $row['regdate'] .'</td>
				<td class="col">'.  $row['regtime'] . '</td>
				<td class="last1">'.  $row['status'] . '</td>
				</tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		// Debug message:
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
     } // End of if ($result)

mysqli_close($dbcon); // Close the database connection.
?>

</div><!-- End of the user’s table page content -->

</div>
</body>
</html>