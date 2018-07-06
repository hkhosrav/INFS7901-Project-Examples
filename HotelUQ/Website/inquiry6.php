<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s4508752)
Miho May Imaizumi (s41981063)

Filename: inquiry6.php

*** History ********************************************************************
16/05/2018 - Created by M.Imaizumi
17/05/2018 - Reviewed & Function checked by M.Imaizumi
18/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to change Street Number and 
Street Name in the relation Customer, and demonstrates
Update Operation (10 points) of existing information in the 
database, while ensuring the domain constraint (i.e Street Number
must be an integer).
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
		<h2>View & Update Customer Information</h2>
	</div>

	<?php
	$ErrorCheckFlag = 0;
	$RunCount = 0;
	$CustomerIDErr = $CStreetNameErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$RunCount  += 1;
		if (empty($_POST["CustomerID"])) {
			$CustomerIDErr = "CustomerID is required";
			$ErrorCheckFlag += 1;
		} else {
			$CustomerID = test_input($_POST["CustomerID"]);
			// check if CustomerID only contains numbers
			if (!preg_match("/^[0-9 ]*$/",$CustomerID)) {
			$CustomerIDErr = "Please enter numbers (0-9)."; 
				$ErrorCheckFlag += 1;
			} else{
				$CustomerIDCheck = "SELECT CustomerID from Customer WHERE CustomerID = '$CustomerID'";
				if ($CustomerIDresult = mysqli_query($conn,$CustomerIDCheck)) {
					if (mysqli_num_rows($CustomerIDresult) > 0) {
						$CustomerIDErr = "";
					} else {
						$CustomerIDErr = "CustomerID does not exit in our database.";
						$ErrorCheckFlag += 1;
					}
				} else {
					$CustomerIDErr = "Query failed.";
					$ErrorCheckFlag += 1;
				}
			}
		}
		if (!empty($_POST["CStreetNo"])) {
			$CStreetNo = test_input($_POST["CStreetNo"]);
			if (!preg_match("/^[0-9 ]*$/",$CStreetNo)) {
			$CStreetNoError = "Please enter numbers (0-9)."; 
				$UpdateErrorFlag += 1;
			} else {
			
			}
		}

		// Street Name
		if (!empty($_POST["CStreetName"])) {
			$CStreetName = test_input($_POST["CStreetName"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$CStreetName)) {
				$CStreetNameErr = "Only letters and white space allowed";
				$UpdateErrorFlag += 1;
			}
			if (empty($_POST["CStreetName_selec"])) {
				$CStreetName_selecErr = "Only letters and white space allowed";
				$UpdateErrorFlag += 1;
			} else {
				$CStreetName_selec = test_input($_POST["CStreetName_selec"]);
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

	<p>Please enter the Customer ID.</p>
	<form target="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<!--Enter Customer ID--> 
		CustomerID: <input type="text" name="CustomerID" value="<?php echo $CustomerID;?>">
		<span class="error">* <?php echo $CustomerIDErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
		<br><br>

		<!--Customer Information Update Form--> 
		<p>To update the customer information, fill in the following text boxes and click Update.</p>
		Street No: <input type="text" name="CStreetNo" value="<?php echo $CStreetNo;?>">
		<span class="error"> <?php echo $CStreetNoError;?></span>
		<br><br>
		Street Name: <input type="text" name="CStreetName" value="<?php echo $CStreetName;?>">
		<span class="error"> <?php echo $CStreetNameError;?></span>	
		
		<!--Street Name Selection--> 
		<select name = "CStreetName_selec">
			<option value = "Street">Street</option>
			<option value = "Road">Road</option>
			<option value = "Terrace">Terrace</option>
			<option value = "Lane">Lane</option>
			<option value = "Avenue">Avenue</option>
			<option value = "Drive">Drive</option>
			<option value = "Boulevard">Boulevard</option>
		</select>
		<br><br>
		<input type="submit" name="Update" value="Update">
		<br><br>
	</form>

	<table class="table thead-dark">
	<thead>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<tr>
			<th scope="col">Customer ID</th>
			<th scope="col">Title</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Date of Birth</th>
			<th scope="col">Email</th>
			<th scope="col">Street No</th>
			<th scope="col">Street Name</th>
			<th scope="col">Suburb</th>
			<th scope="col">State</th>
			<th scope="col">Phone Number</th>
			
		</tr>
	</thead>
	<tbody id="CustomerInformation">
	<?php
	$UpdateErrorFlag = 0;
	if ($ErrorFlag == 0 && $RunCount > 0){
		// Display Customer Information of selected Customer ID Query
		$query = "SELECT *
				FROM Customer
				WHERE Customer.CustomerID = $CustomerID
				";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();	
		}			
		// put all our results into a html table
		while ($rows = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$rows['CustomerID']."</td>";
			echo "<td>".$rows['Title']."</td>";
			echo "<td>".$rows['CFirstName']."</td>";
			echo "<td>".$rows['CLastName']."</td>";
			echo "<td>".$rows['CDOB']."</td>";
			echo "<td>".$rows['CEmail']."</td>";
			echo "<td>".$rows['CStreetNo']."</td>";
			echo "<td>".$rows['CStreetName']."</td>";
			echo "<td>".$rows['CCity']."</td>";
			echo "<td>".$rows['CState']."</td>";
			echo "<td>".$rows['CPhoneNo']."</td>";
			echo "</tr>";
		}
	}
	?>
	</table>
</tbody>
	 <section class="left-content">
		<?php
		// Update Customer 
		if (isset($_POST["Update"])) {
			$CStreetNoUpdate = "UPDATE Customer SET CStreetNo=$CStreetNo WHERE CustomerID=$CustomerID";
			if ($CStreetNoResult = mysqli_query($conn,$CStreetNoUpdate)) {
				echo "Street Number has been updated to ", $CStreetNo;
				echo "<br>";
			} else {
				$CStreetNoError = "Query failed.";
				$UpdateErrorFlag += 1;
			}
			$FullStreetName = $CStreetName . ' ' . $CStreetName_selec;
			$CStreetNameUpdate = "UPDATE Customer SET CStreetName='$FullStreetName' WHERE CustomerID=$CustomerID";
			if ($CStreetNameResult = mysqli_query($conn,$CStreetNameUpdate)) {
				echo "Street Name has been updated to ", $FullStreetName;
				echo "<br>";
			} else {
				echo "Query failed.";
				$UpdateErrorFlag += 1;
			}
		}
			
		?>
	</section>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>