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
  <a class = "active" 
href="https://projectdemos.uqcloud.net/webadvertisingdb/homepage.php" class="right">Home</a>
</div>

<div class="row">
  <div class="main">
      
      <p>
Welcome Advertiser!!! You can manage your ad inventory, understand user interaction and monetisation of your ads on this website.Please login to continue.
      <br/><br/>
Are you interested in advertising at UofU website?. Contact us to discuss opportunities for you.
      <br/><br/>
     <h2>Web Advertising</h2>
      Website advertising domain deals with monetisation of ad space on website. Users accessing the webpages on the website interact with the ads being displayed on the webpage supplied by the advertisers and they pay revenue to the website for this service.
<br/><br/>
UofU website has 2 units of ad space each on 4 of its webpages: home, events, student help and discussion forum.Their 5th webpage i.e. Contact us does not have any ads.When a user lands on a webpage of the website he may be signed on or be a guest. If a user is signed on then we can associate the user activity with their attributes. The ads supplied by the advertiser will be shown on ad spaces in the webpages and advertisers will pay the website an amount based on user clicks received at the end of the day. The cost of click on each slot is decided by UofU and based on clicks made Advertiser will pay the equivalent amount.
<br/><br/>
</p>
<h2>Performance Monitoring Website</h2>
This website enables Administrator to get the following information:
<ul>
<li>Ads, Advertisers and Partner Websites in the system</li>
<li>Attributes of users clicking on Ads</li>
<li>Advertiser billing details</li>
<li>Top revenue generatiing Advertisers</li>
<li>Competitive Advertisers</li>
<li>Gender distribution of people likely to click on the ads</li>
<li>Age distribution of people likely to click on the ads</li>
<li>User age, click and revenue distribution across ad space</li>
<li>Clicks at Ad and Advertiser grain</li>
<li>Revenue at Ad and Advertiser grain</li>
<li>Average Cost per Click across advertisers</li>
<li>Slots Advertisers bid on</li>
<li>Slots Advertisers perform on</li>
</ul>
Additionally Administrator can perform the following DML operations
<ul>
<li>Update Member Attributes</li>
<li>Delete Ads, Advertisers and Partner Website data</li>
</ul>
Advertisers can get the following information
<ul>
<li>Their ads in the system</li>
<li>Attributes of users clicking on their system</li>
<li>Performance of their Ads</li>
</ul>

</p>
  </div>


  
<div class="side">
    <p>Manage your account here<p>
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Click to Login</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/101.php">101:The Cat</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/102.php">102: Big Panda</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/103.php">103: Express Post</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/104.php">104: Uni Salon</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/105.php">105: Bupa</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/106.php">106: Time To Read</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/107.php">107: Iglu</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/108.php">108: Uber Eats</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/109.php">109: Travel Tour</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/110.php">110: Golden Apple</a>
    <a href="https://projectdemos.uqcloud.net/webadvertisingdb/000.php">Administrator</a>

  </div>


</div>
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