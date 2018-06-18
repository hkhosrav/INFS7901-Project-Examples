<?php require_once('../../private/init.php'); ?>

<?php $page_title = 'Facility manager emails'; ?>
<?php include(SHARED_PATH . '/header.php');?>

<header class='report'>
	<?php echo $page_title ?>
</header>

<div id="main">

	<?php
echo "<table class='list' style='border: ;'>";
 echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th>";

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
	$stmt = $conn-> prepare("SELECT CCFirstName, CCLastName, Email FROM Facility;");
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