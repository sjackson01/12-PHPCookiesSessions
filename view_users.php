<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.

session_start();

$page_title = 'View the Current Users';
include('inc/header.php');

// Page header:
echo '<h1>Registered Users</h1>';

require('mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY registration_date ASC";
$r = $mysqli->query($q); // Run the query.

// Count the number of returned rows:
$num = $r->num_rows;

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
		<th align="left">Name</th>
		<th align="left">Date Registered</th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = $r->fetch_object()) {
		echo '<tr><td align="left">' . $row->name . '</td><td align="left">' . $row->dr . '</td></tr>';
	}

	echo '</tbody></table>'; // Close the table.

	$r->free(); // Free up the resources
	unset($r); 

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

$mysqli->close();
unset($mysqli);

include('inc/footer.php');
?>