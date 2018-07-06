<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s4508752)
Miho May Imaizumi (s41981063)

Filename: inquiry9.php

*** History ********************************************************************
17/05/2018 - Created by M.Imaizumi
           - Reviewed & Function checked by M.Imaizumi
18/05/2018 - Final Release version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to view the monthly revenue of Hotel UQ.
The revenue is the sum of all reservation payments based on the month of the
payment date (i.e. If PaidDate is 2018-03-31 then it is the revenue for March ).
This function should demonstrate the following queries as specified in the 
Project Specification:
	- Join Query (10 points)
	- Nested aggregation with group by (20 points)
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
<section class="left-content">
<div class="8u">
	<div align="center">
		<h2>Hotel UQ</h2>
		<h2>View max/min monthly revenue by branch</h2>
	</div>

	<?php
	$ErrorCheckFlag = 0;
	$RunCount = 0;
	$BranchName = $MinMax = "";
	$BranchNameErr = $MinMaxErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$RunCount  += 1;
		if (empty($_POST["MinMax"])) {
			$MinMaxErr = "Please select min or max";
		} else {
			$MinMax= test_input($_POST["MinMax"]);
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
		<!--Minimum & Maximum Radio Buttons--> 
		Min / Max:
		<input type="radio" name="MinMax" <?php if (isset($MinMax) && $MinMax=="Min") echo "checked";?> value="Min">Min
		<input type="radio" name="MinMax" <?php if (isset($MinMax) && $MinMax=="Max") echo "checked";?> value="Max">Max
		<span class="error">* <?php echo $MinMaxErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
		<br><br>
	</form>

	<?php
	if ($ErrorFlag == 0 && $RunCount > 0){
	// Get monthly revenue
	// Minimum monthly revenue (month, revenue)
	$MinRevenue = "
		SELECT month, sum
		FROM (
			SELECT
			MONTH(PaidDate) as month,
			SUM(Amount) as sum 
			FROM Invoice 
			WHERE PaidDate IS NOT NULL 
			GROUP BY MONTH(PaidDate)
		) s
		where sum = 
		(
		SELECT
		min(sum)
			FROM (
			SELECT
			MONTH(PaidDate) as month,
			SUM(Amount) as sum 
			FROM Invoice 
			WHERE PaidDate IS NOT NULL 
			GROUP BY MONTH(PaidDate)
			) s
		) 
	";
	// Maximum monthly revenue (month, revenue)
	$MaxRevenue = "
		SELECT month, sum
		FROM (
			SELECT
			MONTH(PaidDate) as month,
			SUM(Amount) as sum 
			FROM Invoice 
			WHERE PaidDate IS NOT NULL 
			GROUP BY MONTH(PaidDate)
		) s
		where sum = 
		(
		SELECT
		max(sum)
			FROM (
			SELECT
			MONTH(PaidDate) as month,
			SUM(Amount) as sum 
			FROM Invoice 
			WHERE PaidDate IS NOT NULL 
			GROUP BY MONTH(PaidDate)
			) s
	) ";
	echo "<br><br>";
	if ($MinMax == "Min") {
		$MinRevenue_query = mysqli_query($conn, $MinRevenue);
		while ($min_monthly = mysqli_fetch_row($MinRevenue_query)){
			echo "Min Monthly Revenue:";
			echo "<br>";
			$monthName = date('F', mktime(0, 0, 0, $min_monthly[0], 10));
			echo "Month: ", $monthName;
			echo "<br>";
			echo "Sum($): ", number_format((float)$min_monthly[1], 2, '.', '');
			echo "<br><br>";
		}
	} 
	if ($MinMax == "Max") {
		$MaxRevenue_query = mysqli_query($conn, $MaxRevenue);
		while ($max_monthly = mysqli_fetch_row($MaxRevenue_query)){
			echo "Max Monthly Revenue:";
			echo "<br>";
			$monthName = date('F', mktime(0, 0, 0, $max_monthly[0], 10));
			echo "Month: ", $monthName;
			echo "<br>";
			echo "Sum($): ", number_format((float)$max_monthly[1], 2, '.', '');;
			echo "<br><br>";
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