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
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"  id="make_transaction">Market Participant</h3>
	
	<p>Find user ID, first name, last name and email address of all users who have bet a particular market.</p>
	
	<form action="market_participants.php" method="post">
		Event ID: <input type="text" name="event_id"><br>
		Market Type: <input type="text" name="market_type"><br>
		<input type="submit" name="submit" value="Submit"/>
	</form>
	<br>	

	<table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email Address</th>
            </tr>
        </thead>
        <tbody id="eventTable">
            <?php
                // FILL TABLE WITH DATA ON CLICK
                if(isset($_POST["submit"])) {
                    // get all our student data
                    $query = "SELECT DISTINCT Users.User_ID, First_Name, Last_Name, Email_Address
							FROM Users, Bet_Placed
							WHERE Users.User_ID = Bet_Placed.User_ID
							AND Bet_Placed.Event_ID = '". $_POST["event_id"] ."'
							AND Bet_Placed.Market_Type = '". $_POST["market_type"] ."';";
                    
					echo "SELECT DISTINCT Users.User_ID, First_Name, Last_Name, Email_Address <br>
							FROM Users, Bet_Placed <br>
							WHERE Users.User_ID = Bet_Placed.User_ID <br>
							AND Bet_Placed.Event_ID = '". $_POST["event_id"] ."' <br>
							AND Bet_Placed.Market_Type = '". $_POST["market_type"] ."'; <br> <br>";
					
					$result = mysqli_query($conn, $query);
                    // put all our results into a html table
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["User_ID"]."</td>";
                        echo "<td>".$rows["First_Name"]."</td>";
                        echo "<td>".$rows["Last_Name"]."</td>";
                        echo "<td>".$rows["Email_Address"]."</td>";
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
