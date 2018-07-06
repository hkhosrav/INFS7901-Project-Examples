<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s45087525)
Miho May Imaizumi (s41981063)
Filename: inquiry3.php

*** History ********************************************************************
12/05/2018 - Created by A. Tumer
13/05/2018 - Reviewed & Function checked by A. Tumer
13/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to view a list of peak seasons of the year for 
the hotel. 
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
	<h2>Peak Seasons of the Year</h2>
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
                <th scope="col">Month</th>
                <th scope="col">Total Reservations</th>
                
			</tr>
        </thead>
        <tbody id="Rooms">
            <?php
                // FILL TABLE WITH DATA ON CLICK
  //              if(isset($_POST["submit"])) {
                    // get all our student data
                    $query = "SELECT  DATE_FORMAT(Checkin_Date,'%M,%Y') `Month`, COUNT(ReservationNum)'Total Reservations' FROM Reservation GROUP BY Month ORDER BY COUNT(ReservationNum) DESC" ;
                    $result = mysqli_query($conn, $query);
					if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
                    // put all our results into a html table
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
						echo "<td>".$rows["Month"]."</td>";
						echo "<td>".$rows["Total Reservations"]."</td>";						
                        echo "</tr>";
                    }
    //            }
            ?>
        </tbody>
    </table>

<!--
    <form action="" method="post">
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Get Data" style="text-align:right;margin:10px" />
    </form>
-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>