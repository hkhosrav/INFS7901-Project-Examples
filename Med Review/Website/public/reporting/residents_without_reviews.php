<?php require_once('../../private/init.php'); ?>

<?php $page_title = 'Residents - To be reviewed'; ?>
<?php include(SHARED_PATH . '/header.php');?>

<header class='report'>
	<?php echo $page_title ?>
</header>
	

<div id="main">
	<?php
echo "<table class='list' style='border: ;'>";
 echo "<tr><th>ResidentID</th><th>FirstName</th><th>LastName</th><th>Medicare Number</th><th>DOB</th>";

cLass TableRows extends RecursiveIteratorIterator {
	function __construct($it){
		parent::__construct($it, self::LEAVES_ONLY);
	}

	function current(){
		return "<td style='width:150px:border:1px solid black';>" .parent::current()."</td>";   
	}

	function beginChildren() {
		echo "<tr>";
	}

	function endChildren() {
		echo "</tr>";
	}
}


try {
    
	$conn = db_connect();
	$stmt = $conn-> prepare("SELECT * FROM Resident WHERE ResidentID NOT IN ( SELECT ResidentID
FROM Review)");
	$stmt ->execute();

	//set the resulting array to associative
	$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchALL())) as $k=>$v){
		echo $v;
		}

}
catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
	

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>