
<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s45087525)
Miho May Imaizumi (s41981063)
Filename: inquiries.php

*** History ********************************************************************
8/04/2018 - Created by A. Tumer
20/04/2018 - Reviewed & Function checked and Updated by A. Tumer and M.Imaizumi
13/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This web pages provides information about various hotel rooms.
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



<?php

require("libs/config.php");
$pageDetails = getPageDetailsByName($currentPage);
include("header.php");
?>

<div class="row main-row">
    <div class="8u">
        <section class="left-content">
            <h2><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
            <?php echo stripslashes($pageDetails["page_desc"]); ?>
        </section>
<html>
<head>
<script language="JavaScript" type="text/javascript">

function openPop(){
	var Sel_Ind = document.getElementById('myURLs').selectedIndex;
	var popUrl = document.getElementById('myURLs').options[Sel_Ind].value;
	winpops=window.open(popUrl,"HotelUQ-SQL Inqury Result","width=auto height=auto titlebar=yes fullscreen=yes resizable=yes")
}

</script>	
</head>

<body>
	
<p>	
SQL Inquiry:	
<select id="myURLs" name="formSQLInquiries" onChange="javascript:openPop();">                      
  <option value="defaultmenu.php">- - - Select - - -</option>
  <option value="inquiry1.php">1. View Rooms</option>
  <option value="inquiry2.php">2. Count Reservation by Room – Popular Room</option>
  <option value="inquiry3.php">3. Count Reservation by Month – Popular Month</option>
  <option value="inquiry4.php">4. View Average Length of Stay</option>
  <option value="inquiry5.php">5. View Reservation History of Customers</option>
  <option value="inquiry6.php">6. View/Update Customer Information</option>
  <option value="inquiry7.php">7. Delete Reservation</option>
  <option value="inquiry8.php">8. List Employees by Branch</option>
  <option value="inquiry9.php">9. View Min/Max Monthly Revenue</option>
  <option value="inquiry10.php">10. List Branch Details</option>
  
 <!-- <input type="submit" name="formSubmit" value="Submit" > -->

</select>
</p>



    </div>
    <!--sidebar starts-->
	<?php include("sidebar.php"); ?>    
    <!--sidebar ends-->
</div>
<?php
include("footer.php");
?>


</body>
</html>
