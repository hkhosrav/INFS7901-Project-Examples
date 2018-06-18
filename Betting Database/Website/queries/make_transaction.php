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
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"  id="make_transaction">Make Transaction</h3>
	
	<p>The make transaction query allows users to update the database by making a deposit or withdrawal.</p>
	
	<form action="make_transaction.php" method="post">
		User ID: <input type="text" name="user_id"><br>
		Amount: <input type="text" name="amount"><br>
		Account Number: <input type="text" name="acc_no"><br>
		Type: 	<select name="type">
					<option value="D" selected>Deposit</option>
					<option value="W">Withdraw</option>
				</select><br>
		<input type="submit" name="submit" value="Submit"/>
	</form>
		
            <?php
                // FILL TABLE WITH DATA ON CLICK
				
				//WHEN A NEW TRANSACTION IS ADDED TO THE DATABASE A TRIGGER UPDATES THE USERS ACCOUNT BALANCE ACCORDINGLY.
                if(isset($_POST["submit"])) {
					
					// get current account balance
					$sql = "SELECT Account_Balance FROM Users WHERE User_ID =". $_POST["user_id"] .";";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$balance = $row["Account_Balance"];
					
					//CHECK TO SEE IF ACC_NO IS THE CORRECT LENGTH. THIS IS ALSO IMPLEMENTED IN THE DATABASE
					//HOWEVER DATABASE VERISON DOES NOT ALLOW CHECK.
					if(strlen($_POST["acc_no"]) == 14){
					//CHECK TO SEE IF ACC_NO IS THE CORRECT LENGTH. THIS IS ALSO IMPLEMENTED IN THE DATABASE
					//HOWEVER DATABASE VERISON DOES NOT ALLOW CHECK. NOTE THIS CHECK CONDITION IS APPLIED TO 
					//THE USER TABLE MAKING SURE THE Account_Balance > 0.
					if($_POST["type"] == "W"){ 
						if((float)$_POST["amount"] > (float)$balance){
						echo "Insufficient funds. Current account balance is ". (string)$balance .".";
						}else{
							$sql = "INSERT INTO Transactions (Trans_Amount, Trans_Date, Trans_Type, Account_Number, User_ID)
								VALUES (" . $_POST["amount"] .",'". date("Y-m-d") ."','" . $_POST["type"] ."'," . $_POST["acc_no"] .",'" . $_POST["user_id"] ."');";
							if ($conn->query($sql) === TRUE) {
									echo "Transaction processed successfully";
								} else {
									echo "Error: " . $sql . "<br>" . $conn->error;
								}
							$conn->close();
							} 						
					}else{		
					// insert the deposit entry into the deposit table
                    $sql = "INSERT INTO Transactions (Trans_Amount, Trans_Date, Trans_Type, Account_Number, User_ID)
								VALUES (" . $_POST["amount"] .",'". date("Y-m-d") ."','" . $_POST["type"] ."'," . $_POST["acc_no"] .",'" . $_POST["user_id"] ."');";
					
					if ($conn->query($sql) === TRUE) {
							echo "New record created successfully";
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
					
						$conn->close();
                    } 
					}else{
						echo "Error: Account Number is not 14 characters long";
					}
                }
            ?>


<!-- End page content -->
</div>

<!-- Footer -->
 <footer class="w3-center w3-black w3-padding-16">
  <p><a>INFS7901 Project: Betting Database</a></p>
</footer>

</body>
</html>
