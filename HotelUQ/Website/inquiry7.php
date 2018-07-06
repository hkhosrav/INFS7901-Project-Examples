<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s4508752)
Miho May Imaizumi (s41981063)

Filename: inquiry7.php

*** History ********************************************************************
17/05/2018 - Created by M.Imaizumi
           - Reviewed & Function checked by M.Imaizumi
18/05/2018 - Final Release version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to delete a future reservation from the 
database. This function should demonstrate the following queries as specified 
in the Project Specification:
	- Join Query (10 points)
	- Delete Operation (10 points)
********************************************************************************

*** Reference ******************************************************************	
Reservation User Form adapted from:
https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete
Style sheet adapted from:
Example index.php from INFS7901 Blackboard (Thank you Nick!)
********************************************************************************
*/

// SETUP PHP CONNECTION
$servername = "localhost";
$username = "root";
$password = "11653fd813f93ed2";
$dbname = "hoteluqwebdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("<h3>Connection failed: ".$conn->connect_error."</h3>");
}
require("libs/config.php");

?>
<div class="8u">
	<div align="center">
		<h2>Hotel UQ</h2>
		<h2>Delete Reservation</h2>
	</div>

	<?php
	$ErrorCheckFlag = 0;
	$ReservationNumErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["ReservationNum"])) {
			$ReservationNumErr = "Reservation Number is required";
			$ErrorCheckFlag += 1;
		} else {
			$ReservationNum = test_input($_POST["ReservationNum"]);
			// check if CustomerID only contains numbers
			if (!preg_match("/^[0-9 ]*$/",$ReservationNum)) {
			$ReservationNumErr = "Please enter numbers (0-9)."; 
				$ErrorCheckFlag += 1;
			} else{
				$ReservationNumCheck = "SELECT ReservationNum from Reservation WHERE ReservationNum = '$ReservationNum'";
				if ($ReservationNumresult = mysqli_query($conn,$ReservationNumCheck)) {
					if (mysqli_num_rows($ReservationNumresult) > 0) {
						$ReservationNumErr = "";
					} else {
						$ReservationNumErr = "ReservationNum does not exit in our database.";
						$ErrorCheckFlag += 1;
					}
				} else {
					$ReservationNumErr = "Query failed.";
					$ErrorCheckFlag += 1;
				}
			}
		}
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<p>Please enter the Reservation Number to delete the reservation from the database.</p>
	<form target="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<!--Enter Customer ID--> 
		Reservation Number: <input type="text" name="ReservationNum" value="<?php echo $ReservationNum;?>">
		<span class="error">* <?php echo $ReservationNumErr;?></span>
		<br><br>
		<input type="submit" name="Delete" value="Delete">
		<br><br>
	</form>

	 <section class="left-content">
		<?php
		// Delete Reservation
		if (isset($_POST["Delete"])) {
			if ($ErrorFlag == 0) {
				$DeleteInvoice = "
					DELETE 
					FROM Invoice
					WHERE InvoiceID IN (
						SELECT InvoiceID
						FROM invoicereservation
						WHERE ReservationNum = $ReservationNum
				)";
				if ($DeleteInvoice_result = mysqli_query($conn,$DeleteInvoice)) {
					echo "Invoice record for ", $ReservationNum," has been deleted from the database.";
					echo "<br>";
				} else {
					$ReservationNumErr = "Query failed.";
					$UpdateErrorFlag += 1;
				}
				$DeleteReservation = "DELETE From Reservation WHERE ReservationNum=$ReservationNum";
				if ($DeleteReservation_result = mysqli_query($conn,$DeleteReservation)) {
					echo "Reservation number ", $ReservationNum," has been deleted from the database.";
					echo "<br>";
				} else {
					$ReservationNumErr = "Query failed.";
					$UpdateErrorFlag += 1;
				}
			}
		}	
		?>
	</section>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>