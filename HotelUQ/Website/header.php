

<?php
/*
INFS7901 SEMESTER 1 2018 - Project
Project Domain: Hotel Management Database
Students:
Aydin Tumer (s45087525)
Miho May Imaizumi (s41981063)
Filename: header.php

*** History ********************************************************************
8/04/2018 - Created by A. Tumer
20/04/2018 - Reviewed & Function checked and Updated by A. Tumer and M.Imaizumi
13/05/2018 - Final Release Version
********************************************************************************

*** Notes **********************************************************************
This page provides the content for the top frame of the main web page. 
********************************************************************************

*** Reference ******************************************************************	
Source and binary forms of web pages adopted from 
http://www.thesoftwareguy.in
https://www.sitepoint.com/php-amp-mysql-1-installation/
https://www.siteground.com/tutorials/phpmyadmin/
https://www.w3schools.com/php/php_mysql_intro.asp
********************************************************************************
*/
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo stripslashes($pageDetails["page_title"]); ?> - <?php echo SITE_NAME; ?> - www.hoteluq.com.au</title>
        <link rel="icon" href="www.hoteluq.com.au" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo stripslashes($pageDetails["meta_desc"]); ?>" />
        <meta name="keywords" content="<?php echo stripslashes($pageDetails["meta_keywords"]); ?>" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <script src="js/jquery.min.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    </head>
    <body>
        <!-- ********************************************************* -->
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <header id="header">
                            <h1><a href="index.php" id="logo"><?php echo SITE_NAME; ?></a></h1>
                            <nav id="nav">
                                <a href="about-us.php" <?php echo ($currentPage == "about-us") ? ' class="current-page-item"' : '' ?> >About Us</a>
                                <a href="rooms.php" <?php echo ($currentPage == "rooms") ? ' class="current-page-item"' : '' ?>>Rooms</a>
								<a href="reservations.php" <?php echo ($currentPage == "reservations") ? ' class="current-page-item"' : '' ?>>Reservations</a>
								<a href="inquiries.php" <?php echo ($currentPage == "inquiries") ? ' class="current-page-item"' : '' ?>>Inquiries</a>
								<a href="admin/index.php" <?php echo ($currentPage == "admin") ? ' class="current-page-item"' : '' ?>>Admin</a>
                                <a href="contact-us.php" <?php echo ($currentPage == "contact-us") ? ' class="current-page-item"' : '' ?>>Contact Us</a>                          							  
                            </nav>
                        </header>

                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($currentPage == "index") {
            try {
                $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
                $stmt->bindValue(":pname", $pageAlias);
                $stmt->execute();
                $details = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }
            ?>
            <div id="banner-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="12u">

                            <div id="banner" >
                             <div style="text-align:center;" >
							   <?php echo "<img src='images/reception.jpg' width=100% height=270>" ?>
                             </div>
							</div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="main">
            <div class="container">