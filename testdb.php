<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <h1>INFS7901 - Course List</h1>

    <?php 
        // SETUP PHP CONNECTION
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testdb";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("<h3>Connection failed: ".$conn->connect_error."</h3>");
        }
    ?>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Student Number</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody id="studentTable">
            <?php
                // FILL TABLE WITH DATA ON CLICK
                if(isset($_POST["submit"])) {
                    // get all our student data
                    $query = "SELECT * FROM testtable";
                    $result = mysqli_query($conn, $query);
                    // put all our results into a html table
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["studentNum"]."</td>";
                        echo "<td>".$rows["firstName"]."</td>";
                        echo "<td>".$rows["lastName"]."</td>";
                        echo "<td>".$rows["phone"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>

    <form action="" method="post">
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Get Data" style="text-align:right;margin:10px" />
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>