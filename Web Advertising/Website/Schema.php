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
    background-color: white;
    padding: 20px;
}

/* side column */
.side {   
    -ms-flex: 20%; /* IE10 */
    flex: 20%;
    background-color: #f1f1f1;
    padding: 20px;
}

/* Footer */
.footer {
    padding: 1px;
    text-align: left;
    background: #ddd;
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

.btn {
    border: none; /* Remove borders */
    color: white; /* Add a text color */
    padding: 16px 30px; /* Add some padding */
    cursor: pointer; /* Add a pointer cursor on mouse-over */
}

.home {background-color: #1abc9c;} 
.home:hover {background-color: #1abc9c;}

</style>
</head>
<body>

<div class="header">
  <h1>INFS7901 Project</h1>
  <p>Web Advertising System</p>
</div>

<div class="navbar">
    <a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/homepage.php">Logout</a>
    <a href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/000.php">Queries</a>
    <a class = "active" href="https://s4515529-infs7901.uqcloud.net/webadvertisingdb/ER_Diagram.php">ER Diagram</a>
</div>

<div class="row">
    <div class="main">
        <img src = "https://s4515529-infs7901.uqcloud.net/webadvertisingdb/ER_Diagram.png">
        <br>
        <h1>Relational Model</h1>
        <p>UQUWebsite[<u>URL</u>]<p>
		<p>Advertiser[<u>AdvertiserID</u>,Name,Domain]
        <p>Webpage[<u>SlotID</u>,<u>URL</u>,Subpage,SlotClickCost]</p>
		<p>Ad[<u>AdId</u>,<u>AdvertiserID</u>,<b>SlotID</b>,<b>URL</b>,Title,Description,AdURL]</p>
		<p>Clicks[<u>URL</u>,<u>SessionID</u>,<u>ClickID</u>,<u>AdvertiserID</u>,<u>AdID</u>,Date,Time]</p>
		<p>User[<u>SessionID</u>,<u>URL</u>]</p>
		<p>Member[<u>SessionID</u>,<u>URL</u>,Age,Email,Gender,Address]</p>
		<p>Guest[<u>SessionID</u>,<u>URL</u>]</p>
		<br>
		<i>Foreign Keys:</i>
		Webpage.URL ---> UQUWebsite.URL
		<p>Ad.AdvertiserID ---> Advertiser.AdvertiserID</p>
		<p>Ad.SlotID ---> Webpage. SlotID</p>
		<p>Ad.URL ---> Webpage.URL</p>
		<p>Clicks. URL ---> User.URL</p>
		<p>Clicks. SessionID ---> User.SessionID</p>
		<p>Clicks. AdvertiserID ---> Ad. AdvertiserID</p>
		<p>Clicks. AdID ---> Ad.AdID</p>
		<p>User.URL ---> UQUWebsite.URL</p>
		<p>Member.URL ---> User.URL</p>
		<p>Guest.URL ---> User.URL</p>


    </div>
    <div class="side">
    </div>
</div>


<div class="footer">
  <p>Design by Ankit Sharma and Yunqi Zhang</p>
</div>

</body>
</html>