
<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s45087525)
Miho May Imaizumi (s41981063)
Filename: rooms.php

*** History ********************************************************************
8/04/2018 - Created by A. Tumer
20/04/2018 - Reviewed & Function checked and Updated by M.Imaizumi
13/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This web page provides information about various hotel rooms.
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
/* load main database connection details, PHP configuration details 
and top frame  of main page
 */

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
		
		<section class="left-content">
			<h3><?php echo stripslashes("standard room"); ?></h3>
			<?php echo stripslashes("Wake up in this modern spacious Standard Guest Room with great views and a seating area. Stay connected with WiFi (fees apply) and take advantage of the convenient built-in kitchenette to prepare your favourite snack. Stretch out on the sofa or re-energize in the bathroom featuring a walk-in shower."); ?>
			<img src='images/room3.jpg' width=600 height=400>
            <p>&nbsp;</p>
			<h3><?php echo stripslashes("premium room"); ?></h3>
			<?php echo stripslashes("Unwind in the stylish spacious Premium Guest Room, featuring a large armchair with ottoman and ergonomic work zone. Savor the beautiful views and take advantage of the special room service to enjoy Chef's signature dishes delivered to your room. Stay connected with our complementary high-speed Wi-fi internet."); ?>
			<p>&nbsp;</p>
			<img src='images/room4.jpg' width=600 height=400>
        </section>
    </div>
    <!--sidebar starts
    <!--sidebar ends-->
</div>
<?php
include("footer.php");
?>