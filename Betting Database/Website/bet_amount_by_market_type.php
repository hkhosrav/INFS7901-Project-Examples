<!DOCTYPE html>
<html>
<title>INFS7901: Betting Database</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

    <?php 
        // SETUP PHP CONNECTION
        $servername = "localhost";
        $username = "root";
        $password = "559711dfc2eae1f6";
        $dbname = "bettingdb";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("<h3>Connection failed: ".$conn->connect_error."</h3>");
        }
    ?>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="https://projectdemos.uqcloud.net/bettingdb/index.php" class="w3-bar-item w3-button"><b>INFS7901</b> Betting Database</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="https://projectdemos.uqcloud.net/bettingdb/index.php#about" class="w3-bar-item w3-button">About</a>
	  <a href="https://projectdemos.uqcloud.net/bettingdb/index.php#er" class="w3-bar-item w3-button">ER Diagram</a>
      <a href="https://projectdemos.uqcloud.net/bettingdb/index.php#queries" class="w3-bar-item w3-button">Queries</a>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
	<br>
	<br>
	<!-- About Section -->
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"  id="make_transaction">Bet Amount By Market Type</h3>
	
	<p>Finds the Min/Max of average bet amount for each market type.</p>
	
	<form action="bet_amount_by_market_type.php" method="post">
		Type: 	<select name="type">
					<option value="MIN" selected>Min</option>
					<option value="MAX">Max</option>
				</select><br>
		<input type="submit" name="submit" value="Submit"/>
	</form>
	<br>	

	<table class="table">
        <thead>
            <tr>
                <th scope="col">Market Type</th>
                <th scope="col">Average Bet Amount</th>
            </tr>
        </thead>
        <tbody id="eventTable">
            <?php
                // FILL TABLE WITH DATA ON CLICK
                if(isset($_POST["submit"])) {
                    // get all our student data
                    $query = "SELECT *
								FROM(
								SELECT Market_Type, AVG(Bet_Amount) AS Avg_Bet
								FROM Bet_Placed
								GROUP BY Market_Type) AS Avg_Tble
								WHERE Avg_Bet = (SELECT ". $_POST["type"] ."(Avg_Bet)
								FROM (SELECT Market_Type, AVG(Bet_Amount) AS Avg_Bet
								FROM Bet_Placed
								GROUP BY Market_Type) AS Tble1);";
                    				
					echo "SELECT * <BR>
								FROM(  <BR>
								SELECT Market_Type, AVG(Bet_Amount) AS Avg_Bet <BR>
								FROM Bet_Placed <BR>
								GROUP BY Market_Type) AS Avg_Tble <BR>
								WHERE Avg_Bet = (SELECT ". $_POST["type"] ."(Avg_Bet) <BR>
								FROM (SELECT Market_Type, AVG(Bet_Amount) AS Avg_Bet <BR>
								FROM Bet_Placed <BR>
								GROUP BY Market_Type) AS Tble1);<br><br>";
					
					
					$result = mysqli_query($conn, $query);
                    // put all our results into a html table
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["Market_Type"]."</td>";
                        echo "<td>".$rows["Avg_Bet"]."</td>";
                        echo "</tr>";
                    }
                }
				$conn->close();
            ?>
        </tbody>
    </table>
		
<!-- End page content -->
</div>

<!-- Footer -->
 <footer class="w3-center w3-black w3-padding-16">
  <p><a>INFS7901 Project: Betting Database</a></p>
</footer>

</body>
</html>
