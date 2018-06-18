<!DOCTYPE html>
<html lang="en">
<head>
<title>UofU Web Advertising Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

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
    -ms-flex: %; /* IE10 */
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


table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}


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
}

.home {background-color: #1abc9c;} 
.home:hover {background-color: #000000;}

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
  <a href="https://projectdemos.uqcloud.net/webadvertisingdb/homepage.php">Logout</a>
  <a href="https://projectdemos.uqcloud.net/webadvertisingdb/101.php">Queries</a>
  <a class = "active" href="https://projectdemos.uqcloud.net/webadvertisingdb/Glossary_101.php">Glossary</a>
</div>

<div class="row">
    <div class="main">
      <h3>Cost distribution across slots</h3>
      <table>
  <tr>
  	<th>Website</th>
  	<th>Page</th>
    <th>Slot ID</th>
    <th>Cost per Click</th>
  </tr>
  <tr>
  	<td>UofU</td>
  	<td>Home</td>
    <td>1</td>
    <td>$2.99</td>
  </tr>
  <tr>
  	<td>UofU</td>
  	<td>Home</td>
    <td>2</td>
    <td>$2.49</td>
  </tr>
  <tr>
  	<td>UofU</td>
  	<td>Events</td>
    <td>3</td>
    <td>$2.49</td>
  </tr>
  <tr>
  	<td>UofU</td>
   	<td>Events</td>
    <td>4</td>
    <td>$1.99</td>
  </tr>
  <tr>
  	<td>UofU</td>
   	<td>Student Help</td>
    <td>5</td>
    <td>$1.99</td>
  </tr>
  <tr>
   	<td>UofU</td>
  	<td>Student Help</td>
    <td>6</td>
    <td>$1.49</td>
  </tr>
  <tr>
   	<td>UofU</td>
  	<td>Discussion Forum</td>
    <td>7</td>
    <td>$1.49</td>
  </tr>
   <tr>
  	<td>UofU</td>
   	<td>Discussion Forum</td>
    <td>8</td>
    <td>$0.99</td>
  </tr>
</table>
<br>
<br> 
<p><b>Cost Per Click (CPC): </b></p>
<p>Refers to the actual price you pay for each click in your pay-per-click (PPC) marketing campaigns.</p> 
<p>CPC = Sum of costs associated with Slot IDs clicked on / Total number of clicks</p>
      
    </div>

  <div class="side">

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