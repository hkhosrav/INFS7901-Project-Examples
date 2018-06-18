<!DOCTYPE html>
<html>
<title>INFS7901: Betting Database</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="https://projectdemos.uqcloud.net/bettingdb/index.php" class="w3-bar-item w3-button"><b>INFS7901</b> Betting Database</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
	<a href="#er" class="w3-bar-item w3-button">ER Diagram</a>
      <a href="#queries" class="w3-bar-item w3-button">Queries</a>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
	<br>
	<br>
	<!-- About Section -->
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"  id="about">About</h3>
	<p>Welcome to the graphical user interface for the online betting database application. 
	Within this page you can view the ER diagram for the database, as well as interact with the database. 
	If you are a customer of this company relevant tools are under the customer heading. 
	If you are an employee of this company many meaningful insights can be found through the queries under the employee heading.</p>
	
	<!-- ER Section -->
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" id="er">ER Diagram</h3>
	<img class="w3-image" src="images/ER-Diagram.jpg" alt="ER-Diagram">

  <!-- Query Section -->
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" id="queries">Employee Queries</h3>
	  <div class="w3-row-padding w3-grayscale">
		<div class="w3-col l3 m6 w3-margin-bottom">
		  <h3>Market Participants</h3>
		  <p class="w3-opacity">Join Query</p>
		  <p>Find all customers who have bet on a particular event market.</p>
		  <p><button class="w3-button w3-light-grey w3-block"><a href="queries/market_participants.php"> Go To Query </a></button></p>
		</div>
		<div class="w3-col l3 m6 w3-margin-bottom">
		  <h3>Participated in All Markets</h3>
		  <p class="w3-opacity">Division Query</p>
		  <p>Find custromers who have bet on all markets for a particular event.</p>
		  <p><button class="w3-button w3-light-grey w3-block"><a href="queries/all_markets.php"> Go To Query </a></button></p>
		</div>
		<div class="w3-col l3 m6 w3-margin-bottom">
		  <h3>Market Summary</h3>
		  <p class="w3-opacity">Aggregation Query</p>
		  <p>Allows employees to understand the current status of a market.</p>
		  <p><button class="w3-button w3-light-grey w3-block"><a href="queries/market_summary.php"> Go To Query </a></button></p>
		</div>
		<div class="w3-col l3 m6 w3-margin-bottom">
		  <h3>Bet Amount By Market Type</h3>
		  <p class="w3-opacity">Nested Aggregation Query</p>
		  <p>Finds the Min/Max of average bet amount for each market type.</p>
		  <p><button class="w3-button w3-light-grey w3-block"><a href="queries/bet_amount_by_market_type.php"> Go To Query </a></button></p>
		</div>
	  </div>

<!-- End page content -->
</div>

<!-- Footer-->
 <footer class="w3-center w3-black w3-padding-16">
  <p><a>INFS7901 Project: Betting Database</a></p>
</footer>


</body>
</html>
