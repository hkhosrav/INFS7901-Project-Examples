<!DOCTYPE html>
<html lang="en">
<head>
<title>UofU Web Advertising Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
}

/* Style the body */
body {
    font-family: Arial;
    margin: 0;
}

/* Header/logo Title */
.header {
    padding: 20px;
    text-align: left;
    background: #1abc9c;
    color: white;
}

/* Increase the font size of the heading */
.header h1 {
    font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

.navbar a.active {
  border-bottom: 3px solid #1abc9c;
}

/* Column container */
.row {  
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* main/right column */
.main {
    -ms-flex: 80%; /* IE10 */
    flex: 80%;
    background-color: #ddd;
    padding: 20px;
}

/* side column */
.side {   
    -ms-flex: 20%; /* IE10 */
    flex: 20%;
    background-color: #f1f1f1;
    padding: 20px;
}

.dropbtn {
    background-color: #1abc9c;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #333;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 200px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 16px;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}

/* Footer */
.footer {
    padding: 1px;
    text-align: left;
    background: #1abc9c;
    color: white;
}

.btn {
    border: none; /* Remove borders */
    color: white; /* Add a text color */
    padding: 16px 30px; /* Add some padding */
    cursor: pointer; /* Add a pointer cursor on mouse-over */
    font-size: 16px;
}

.home {background-color: #1abc9c;} 
.home:hover {background-color: #000000;}

.btn {background-color: #1abc9c;} 
.btn:hover {background-color: #000000;}


.table{
    border: 2px solid black;
    border-collapse: collapse;
    padding: 5px;
    background-color: #ffffff;
}

th {
    padding: 5px;
    border: 2px solid black;
    border-collapse: collapse;
}

td {
    padding: 5px;
    border: 2px solid black;
    border-collapse: collapse;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width: 100%;
    }
}

</style>
</head>
<body>

<div class="header">
  <h1>Web Advertising System on UofU website</h1>
  <p>INFS7901 Project</p>
</div>

<div class="navbar">
    <a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/homepage.php">Logout</a>
    <a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000.php">Queries</a>
    <a class="active" href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/SQL_Queries.php">SQL Queries</a>
</div>

<div class="row">
  <div class="main"
    <i>Administrator SQL Queries</i>
    <br>
    <p><b>Selection and Projection</b></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q1.php">Get information about Advertisers in the system</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q2.php">Get information about Ads in the system</a></p>
    <br>
    <p><b>Join Operation</b></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q3.php">Get attributes of users clicking on Ads</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q4.php">Generate Advertiser Bill</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q5.php">Get top Revenue generating Advertisers</a></p>
    <br>
    <p><b>Division Operation</b></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q6.php">Get competitive Advertisers (Bidding on all Ad slots)</a></p>
    <br>
    <p><b>Aggregation Operation</b></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q7.php">Get information about Gender distribution among users</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q8.php">Get information about Age distribution by Gender among users</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q9.php">Get information about Age, Click and Revenue distribution across ad space</a></p>
    <br>
    <p><b>Nested Aggregation with Group by</b></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q10.php">Get information about Clicks at Ad grain</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q11.php">Get information about Clicks at Advertiser grain</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q12.php">Get information about Revenue at Ad grain</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q13.php">Get information about Revenue at Advertiser grain</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q14.php">Get information about Average cost per click of Ads</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q15.php">Get information about Slot bidding by Advertisers</a></p>
    <p><a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000_q16.php">Get information about Advertiser performance across slots</a></p>
    <br>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
    
    <div class="side">
    	<br>
    </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<div class="footer">
  <p>&nbsp&nbsp&nbspDesign by Ankit Sharma and Yunqi Zhang</p>
</div>

</body>
</html>