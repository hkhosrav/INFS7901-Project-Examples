<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s45087525)
Miho May Imaizumi (s41981063)
Filename: inquiry10.php

*** History ********************************************************************
12/05/2018 - Created by A. Tumer
13/05/2018 - Reviewed & Function checked by A. Tumer
13/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This file provides functionality to view a list of hotel's various branches. 
which allows users to display the details of all existing hotel branches.
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
	<h2>Branch Details</h2>
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
	<!--List of column names to display in the result--> 
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">BranchName</th>
				<th scope="col">Street No</th>
				<th scope="col">Street Name</th>
				<th scope="col">City</th>
				<th scope="col">State</th>
				<th scope="col">Post Code</th>
				<th scope="col">Contact Email</th>
				<th scope="col">Phone No</th>
			</tr>
        </thead>
        <tbody id="Rooms">
            <?php
					// send SQL inquiry to the database 
                    $query = "SELECT * FROM `Branch` ORDER BY `BranchName` ASC" ;
                    $result = mysqli_query($conn, $query);
                    // put all our results into a html table
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
						echo "<td>".$rows["BranchName"]."</td>";
						echo "<td>".$rows["HStreetNo"]."</td>";	
						echo "<td>".$rows["HStreetName"]."</td>";		
                        echo "<td>".$rows["HCity"]."</td>";
						echo "<td>".$rows["HState"]."</td>";
						echo "<td>".$rows["HPostCode"]."</td>";
						echo "<td>".$rows["HEmail"]."</td>";
						echo "<td>".$rows["HPhoneNo"]."</td>";
					
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