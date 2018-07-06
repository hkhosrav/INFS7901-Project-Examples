<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s4508752)
Miho May Imaizumi (s41981063)

Filename: reservation.php

*** History ********************************************************************
20/04/2018 - Format created by A.Tumer
29/04/2018 - User form added by M.Imaizumi (see Reference)
06/05/2018 - User form updated by M.Imaizumi
10/05/2018 - Date & Room availability check functionality added by M.Imaizumi
13/05/2018 - Insert tuple functionality added by M.Imaizumi
18/05/2018 - Final Release version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to create a new reservation into the database.
The user enters the necessary information to create a new reservation into the 
text boxes provided in the page.
The selected Check-in to check-out date range is checked with the date range of 
all existing reservation of the room that meets the specified capacity and room 
type at the selected branch. The function should demonstrate the following 
queries as specified in the Project Specification:
	- Join Query (10 points)
	- Division Query (10 points)
	- Aggregation Query (10 points)
	- Update Operation (10 points ) --> Check statement in SQL DDL
********************************************************************************

*** Reference ******************************************************************	  
Reservation User Form adapted from:
https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete
********************************************************************************
*/

// SETUP PHP CONNECTION
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "hoteluqwebdb";

// Constants
$conn = new mysqli($servername, $username, $password, $dbname);
$todaydate = date("Y-m-d");
$ErrorFlag = 0;
$RunCount = 0;

if ($conn->connect_error) {
	die("<h3>Connection failed: ".$conn->connect_error."</h3>");
}
 
require("libs/config.php");
$pageDetails = getPageDetailsByName($currentPage);
include("header.php");
?>
<div class="row main-row">
    <div class="8u">
        <section class="left-content">
            <h2><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
            <?php echo stripslashes($pageDetails["page_desc"]); ?>
			<?php
			// define variables and set to empty values
			$CustomerIDErr = $GuestNumErr = $BranchNameErr = $RoomTypeErr = $CheckinDateErr = "";
			$CustomerID = $GuestNum = $BranchName = $CheckinDate = $CheckoutDate = $RoomType = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$RunCount  += 1;
				// Customer ID Field
				if (empty($_POST["CustomerID"])) {
					$CustomerIDErr = "CustomerID is required";
					$ErrorFlag += 1;
				} else {
					$CustomerID = test_input($_POST["CustomerID"]);
					// check if CustomerID only contains numbers
					if (!preg_match("/^[0-9 ]*$/",$CustomerID)) {
					$CustomerIDErr = "Please enter numbers (0-9)."; 
						$ErrorFlag += 1;
					} else{
						$CustomerIDCheck = "SELECT CustomerID from Customer WHERE CustomerID = '$CustomerID'";
						if ($CustomerIDresult = mysqli_query($conn,$CustomerIDCheck)) {
							if (mysqli_num_rows($CustomerIDresult) > 0) {
								$CustomerIDErr = "";
							} else {
								$CustomerIDErr = "CustomerID does not exit in our database.";
								$ErrorFlag += 1;
							}
						} else {
							$CustomerIDErr = "Query failed.";
							$ErrorFlag += 1;
						}
					}
				}				
				// Branch Name Field
				if (empty($_POST["BranchName"])) {
					$BranchNameErr = "Branch Name is required";
					$ErrorFlag += 1;
				} else {
					$BranchName = test_input($_POST["BranchName"]);
				}
				// Number of guests Field
				if (empty($_POST["GuestNum"])) {
					$GuestNumErr = "Please enter number of guests";
					$ErrorFlag += 1;
				} else {
					$GuestNum = test_input($_POST["GuestNum"]);
					// check if GuestNum only contains numbers
					if (!preg_match("/^[0-9 ]*$/",$GuestNum)) {
					$GuestNumErr = "Please enter numbers (0-9)."; 
						$ErrorFlag += 1;
					}
				}				
				// Check in Date Field
				if (empty($_POST["CheckinDate"])) {
					$CheckinDateErr = "Invalid Date" ;
				} else {
					$CheckinDate = test_input($_POST["CheckinDate"]);
					// check if Date is valid
					if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$CheckinDate)) {
						if ($todaydate > $CheckinDate){
							$CheckinDateErr = "Please enter a valid date";
							$ErrorFlag += 1;
						} elseif ($todaydate == $CheckinDate) {
							$CheckinDateErr = "Please call the reception to make a booking for today.";
							$ErrorFlag += 1;
						} else {
							$CheckinDateErr = "";
						}
					} else {	
					$CheckinDateErr = "Please enter a date in YYYY-MM-DD"; 
					}
				}
				
				// Check in Date Field
				if (empty($_POST["CheckoutDate"])) {
					$CheckoutDateErr = "Invalid Date"; 
					$ErrorFlag += 1;
				} else {
					$CheckoutDate = test_input($_POST["CheckoutDate"]);
					// check if Date is valid
					if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$CheckoutDate)) {
						if ($todaydate > $CheckinDate){
							$CheckoutDateErr = "Please enter a valid date";
							$ErrorFlag += 1;
						} else {
							$CheckoutDateErr = "";
						}
					} else {
					$CheckoutDateErr = "Please enter a date in YYYY-MM-DD";
					$ErrorFlag += 1;
					}
				}
				// Check in Date Field
				if (empty($_POST["RoomType"])) {
					$RoomTypeErr = "Please select a Room Type";
				} else {
					$RoomType = test_input($_POST["RoomType"]);
				}
			}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			?>

			<p><span class="error">* required field</span></p>
			<form target="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			CustomerID: <input type="text" name="CustomerID" value="<?php echo $CustomerID;?>">
			<span class="error">* <?php echo $CustomerIDErr;?></span>
			<br><br>
			Hotel Branch:
			<?php
				// Branch Name drop down list
				echo '<select name="BranchName">'; //Open drop down box 
				$branchlist = "SELECT BranchName FROM Branch";
				$branchresult = mysqli_query($conn,$branchlist);
				while ($row = mysqli_fetch_array($branchresult)) {
					echo "<option value='" . $row['BranchName'] ."'>" . $row['BranchName'] ."</option>";
				}
				echo '</select>';// Close drop down box
			?>
			<br><br>
			Number of Guests: <input type="text" name="GuestNum" value="<?php echo $GuestNum;?>">
			<span class="error">* <?php echo $GuestNumErr;?></span>
			<br><br>			
			Check-in Date: <input type="text" name="CheckinDate" value="<?php echo $CheckinDate;?>">
			<span class="error">* <?php echo $CheckinDateErr;?></span>
			<br><br>
			Check-out Date: <input type="text" name="CheckoutDate" value="<?php echo $CheckoutDate;?>">
			<span class="error">* <?php echo $CheckoutDateErr;?></span>	
			<br><br>
			Room Type:
			<input type="radio" name="RoomType" <?php if (isset($RoomType) && $RoomType=="Premium") echo "checked";?> value="Premium">Premium
			<input type="radio" name="RoomType" <?php if (isset($RoomType) && $RoomType=="Standard") echo "checked";?> value="Standard">Standard
			  
			<span class="error">* <?php echo $RoomTypeErr;?></span>
			<br><br>
			<input type="submit" name="submit" value="Submit">
			<br><br>
			<br><br>
			</form>

			<?php
			// Check & Print Query
			if ($ErrorFlag == 0 && $RunCount > 0){
				// Check User Entries:
				// Check Branch Room Capacity & Availability
				$RoomCheck = "
					SELECT *
					FROM
					RoomBranchCapacity 
					INNER JOIN
					RoomBranchType
					ON RoomBranchCapacity.RoomNum = RoomBranchType.RoomNum AND RoomBranchCapacity.BranchName = RoomBranchType.BranchName
					WHERE 
					RoomBranchCapacity.BranchName = '$BranchName'
					AND RoomBranchCapacity.Capacity >= $GuestNum
					AND RoomType = '$RoomType'
					and not exists(
					select *
					from
					ReservationRoom
					where
					RoomBranchCapacity.RoomNum = ReservationRoom.RoomNum AND RoomBranchCapacity.BranchName = ReservationRoom.BranchName
					and
					(  ((ReservationRoom.Checkin_Date >= '$CheckinDate')  and (ReservationRoom.Checkin_Date <= '$CheckoutDate')) 
					or ((ReservationRoom.Checkout_Date >= '$CheckinDate') and (ReservationRoom.Checkout_Date <= '$CheckoutDate')) 
					or ((ReservationRoom.Checkin_Date < '$CheckinDate')   and (ReservationRoom.Checkout_Date > '$CheckinDate')))

					-- ReservationRoom.Checkin_Date <= '$CheckoutDate' AND ReservationRoom.Checkout_Date >= '$CheckinDate'
					-- start date:  '$CheckinDate'
					-- end date:    '$CheckoutDate'
					)
					LIMIT 1
				";
				$RoomCheckResult = mysqli_query($conn,$RoomCheck);
				if (mysqli_num_rows($RoomCheckResult) > 0) {
					echo "<h2>Reservation Request Summary:</h2>";
					echo "<p>Thank you for making a reservation at Hotel UQ. We look forward to your stay. Please contact the reception if you find any incorrect information below.</p>";
					$newrevnum_query = mysqli_query($conn,"SELECT MAX(ReservationNum)+1 FROM Reservation");
					while ($newrevnum = mysqli_fetch_row($newrevnum_query)){
						$NewReservationNum = (int)$newrevnum[0];
						echo "Your Reservation Number: ", $NewReservationNum;
						echo "<br>";
					}					
					echo "Customer ID: ", $CustomerID;
					echo "<br>";
					echo "Number of Guests: ", $GuestNum;
					echo "<br>";
					echo "Hotel Branch: ",$BranchName;	
					echo "<br>";					
					// Select a Room
					while($roomresult = mysqli_fetch_row($RoomCheckResult)) {
						$roomselection = (int)$roomresult[0];
						echo "Room Number: ", $roomselection;
					}
					// Reservation succuessful message
					echo "<br>";
					echo "Check-in Date: ",$CheckinDate;
					echo "<br>";
					echo "Check-out Date: ",$CheckoutDate;
					echo "<br>";
					// Days between Check-in & Check-out
					$StayLengthQuery = "SELECT DATEDIFF('$CheckoutDate','$CheckinDate') as t";
					$StayLength = mysqli_query($conn,$StayLengthQuery);
					while($printresult = mysqli_fetch_array($StayLength)) {
						echo "Number of nights: ",$printresult['t'];
						$StayLengthNum = $printresult['t'];
					}
					echo "<br>";
					echo "Room Type: ",$RoomType;
					echo "<br>";
					// Calculate total cost
					$price_query = "SELECT Price FROM RoomBranchPrice WHERE RoomBranchPrice.BranchName = '$BranchName' AND RoomBranchPrice.RoomNum = $roomselection";
					$price_result = mysqli_query($conn,$price_query);
					while($price_row = mysqli_fetch_row($price_result)) {
						$room_price = $price_row[0] * $StayLengthNum;
						echo "Total Amount: $", number_format((float)$room_price, 2, '.', '');
						echo "<br>";
					}
					// Insert into Reservation, Invoice, ReservationInvoice, InvoiceReservation, ReservationRoom, ReservationCustomer tables
					$NewReservationQuery = "INSERT INTO Reservation VALUES ($NewReservationNum, '$CheckinDate', '$CheckoutDate')";
					if (mysqli_query($conn,$NewReservationQuery)){
						echo "<br>";
						echo "<br>";
						echo "New record added into Relation Reservation";
					} else {
						echo "<br>";
						echo "<br>";						
						echo "<p>Oops, sorry something's wrong. Could not access the database.</p>";
					}
					$newinvnum_query = mysqli_query($conn,"SELECT MAX(InvoiceID)+1 FROM Invoice");
					while ($newinvnum = mysqli_fetch_row($newinvnum_query)){
						$NewInvoiceNum = (int)$newinvnum[0];
					}		
					$NewInvoiceQuery = "INSERT INTO Invoice VALUES ($NewInvoiceNum, 'Unpaid', 'Accommodation',$room_price,NULL,'$todaydate')";
					if (mysqli_query($conn,$NewInvoiceQuery)){
						echo "<br>";
						echo "New record added into Relation Invoice";
					} else {
						echo "<br>";						
						echo "<p>Oops, sorry something's wrong. Could not access the database.</p>";
					}					
					$NewReservationCustomerQuery = "INSERT INTO ReservationCustomer VALUES($NewReservationNum, $CustomerID, '$CheckinDate', '$CheckoutDate')";
					if (mysqli_query($conn,$NewReservationCustomerQuery)){
						echo "<br>";
						echo "New record added into Relation ReservationCustomer";
					} else {
						echo "<br>";						
						echo "<p>Oops, sorry something's wrong. Could not access the database.</p>";
					}
					$NewReservationRoomQuery = "INSERT INTO ReservationRoom VALUES($NewReservationNum, '$CheckinDate', '$CheckoutDate',$roomselection, '$BranchName')";
					if (mysqli_query($conn,$NewReservationRoomQuery)){
						echo "<br>";
						echo "New record added into Relation ReservationRoom";
					} else {
						echo "<br>";						
						echo "<p>Oops, sorry something's wrong. Could not access the database.</p>";
					}					
					
					$NewInvoiceReservationQuery = "INSERT INTO InvoiceReservation VALUES($NewInvoiceNum,$NewReservationNum)";
					$NewReservationInvoiceQuery = "INSERT INTO ReservationInvoice VALUES($NewReservationNum, $NewInvoiceNum)";
					if (mysqli_query($conn,$NewInvoiceReservationQuery) && mysqli_query($conn,$NewReservationInvoiceQuery)){
						echo "<br>";
						echo "New record added into Relation ReservationInvoice";
					} else {
						echo "<br>";						
						echo "<p>Oops, sorry something's wrong. Could not access the database.</p>";
					}
				} else {
					echo "<p>Sorry, we could not find an available room at the selected Branch. Please contact the reception.</p>";
				}
			}
			?>

	   </section>
    
    </div>
    <!--sidebar starts-->
	<?php include("sidebar_reservation.php"); ?>    
    <!--sidebar ends-->
</div>
<?php
include("footer.php");
?>