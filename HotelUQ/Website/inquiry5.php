<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s45087525)
Miho May Imaizumi (s41981063)
Filename: inquiry5.php

*** History ********************************************************************
12/05/2018 - Created by A. Tumer
13/05/2018 - Reviewed & Function checked by A. Tumer
13/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to view a list of previous customer reservations. 
All users will be able to view records of reservations of all customers. 
Users are able to choose the branch name and the query will output all associated 
information relating to a reservation at the selected branch during the selected 
time period
********************************************************************************

*** Reference ******************************************************************	
Source and binary forms of web pages adopted from 
http://www.thesoftwareguy.in
https://www.sitepoint.com/php-amp-mysql-1-installation/
https://www.siteground.com/tutorials/phpmyadmin/
https://www.w3schools.com/php/php_mysql_intro.asp
Example index.php from INFS7901 Blackboard (Thank you Nick!)
********************************************************************************
*/
?>


<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div align="center">
    <h2>Hotel UQ</h2>
	<h2>Reservation History of Customers</h2>
</div>
<?php 
	// SETUP PHP CONNECTION
	$servername = "localhost";
	$username = "root";
	$password = "11653fd813f93ed2";
	$dbname = "hoteluqwebdb";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("<h3>Connection failed: ".$conn->connect_error."</h3>");
	}
?>

<table class="table table-dark">
<thead>
	<tr>
		<th scope="col">Reservation No</th>
		<th scope="col">Customer ID</th>
		<th scope="col">Invoice ID</th>
		<th scope="col">Room No</th>
		<th scope="col">Branch Name</th>
		<th scope="col">Check-in Date</th>
		<th scope="col">Check-out Date</th>
		
	</tr>
</thead>
<tbody id="ReserveHistory">
<?php
// get the query results to  view records of reservations of all customers
    $query = "SELECT ReservationInvoice.ReservationNum AS RIRN,
			ReservationCustomer.CustomerID AS RCCI,
			ReservationInvoice.InvoiceID AS RIII,
			ReservationRoom.RoomNum AS RRRN,
			ReservationRoom.BranchName AS RRBN,
			ReservationRoom.Checkin_Date AS RRCID,
			ReservationRoom.Checkout_Date AS RRCOD
			FROM ReservationRoom INNER JOIN ReservationInvoice ON ReservationRoom.ReservationNum = ReservationInvoice.ReservationNum INNER JOIN ReservationCustomer ON ReservationRoom.ReservationNum = ReservationCustomer.ReservationNum 
			ORDER BY ReservationCustomer.CustomerID ASC
			";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();	
	}			
    // put all our results into a html table
	while ($rows = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$rows['RIRN']."</td>";
		echo "<td>".$rows['RCCI']."</td>";
		echo "<td>".$rows['RIII']."</td>";
		echo "<td>".$rows['RRRN']."</td>";
		echo "<td>".$rows['RRBN']."</td>";
		echo "<td>".$rows['RRCID']."</td>";
		echo "<td>".$rows['RRCOD']."</td>";
		echo "</tr>";
	}
?>
</tbody>
</table>
			
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>