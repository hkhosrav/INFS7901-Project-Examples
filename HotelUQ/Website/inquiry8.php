<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s4508752)
Miho May Imaizumi (s41981063)

Filename: inquiry8.php

*** History ********************************************************************
17/05/2018 - Created by M.Imaizumi
           - Reviewed & Function checked by M.Imaizumi
18/05/2018 - Final Release version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to view the employee information of the hotel
brach that has been selected by the user. The function also counts the number of
employees working at the branch and shows the name of the branch manager.
This function should demonstrate the followint queries as specified in the 
Project Specification:
	- Join Query (10 points)
********************************************************************************

*** Reference ******************************************************************	
User Form adapted from:
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
		<h2>View Hotel Employee Information</h2>
	</div>

	<?php
	$ErrorCheckFlag = 0;
	$RunCount = 0;
	$CustomerIDErr = $CStreetNameErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$RunCount  += 1;
		if (empty($_POST["BranchName"])) {
			$BranchNameErr = "Branch Name is required";
			$ErrorFlag += 1;
		} else {
			$BranchName = test_input($_POST["BranchName"]);
		}
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<p>Please select the branch name from the list:</p>
	<form target="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<!--Enter Customer ID--> 
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
		<input type="submit" name="submit" value="Submit">
		<br><br>
	</form>

	<table class="table thead-dark">
	<thead>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<tr>
			<th scope="col">Employee ID</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Email</th>
			<th scope="col">Date of Birth</th>
			<th scope="col">Street No</th>
			<th scope="col">Street Name</th>
			<th scope="col">Suburb</th>
			<th scope="col">State</th>
			<th scope="col">Phone Number</th>
			
		</tr>
	</thead>
	<tbody id="EmployeeInformation">
	<?php
	if ($ErrorFlag == 0 && $RunCount > 0){
		// Display Customer Information of selected Customer ID Query
		$query = "SELECT *
				FROM Employee
				WHERE BranchName = '$BranchName'
				";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();	
		}			
		// put all our results into a html table
		while ($rows = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$rows['EmployeeID']."</td>";
			echo "<td>".$rows['EFirstName']."</td>";
			echo "<td>".$rows['ELastName']."</td>";
			echo "<td>".$rows['EEmail']."</td>";
			echo "<td>".$rows['EDOB']."</td>";
			echo "<td>".$rows['EStreetNo']."</td>";
			echo "<td>".$rows['EStreetName']."</td>";
			echo "<td>".$rows['ECity']."</td>";
			echo "<td>".$rows['EState']."</td>";
			echo "<td>".$rows['EPhoneNo']."</td>";
			echo "</tr>";
		}
	}
	?>
	</table>
</tbody>
	 <section class="left-content">
		<?php
		if ($ErrorFlag == 0 && $RunCount > 0){
			// Get Manager Name
			$BranchTotal = "
			SELECT COUNT(*)
			FROM Employee
			WHERE BranchName = '$BranchName'
			";
			$BranchTotal_query = mysqli_query($conn, $BranchTotal);
			while ($branchtotal_num = mysqli_fetch_row($BranchTotal_query)){
				echo "The number of employees at ",$BranchName, " Branch is ", (int)$branchtotal_num[0],'.';
				echo "<br>";
			}
			$ManagerSearch = "
			SELECT EFirstName, ELastName
			FROM Employee
			WHERE EmployeeID IN (
				SELECT ManagerID
				From BranchManager
				WHERE BRanchName = '$BranchName'
			)";
			$ManagerSearch_query = mysqli_query($conn, $ManagerSearch);
			while ($branch_manager = mysqli_fetch_row($ManagerSearch_query)){
				$manager_name = $branch_manager[0].' '.$branch_manager[1];
					echo $BranchName ," Branch is managed by: ", $manager_name,'.';
					echo "<br>";
			}
			}
		?>
	</section>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>