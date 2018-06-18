<?php require_once('../../private/init.php'); ?>

<?php $page_title = 'Drug Use Evaluation - Antipsychotic usage'; ?>
<?php include(SHARED_PATH . '/header.php');?>

<header class='report'>
	<?php echo $page_title ?>
</header>

<div id="main">
	<?php
echo '<table class="list" style="border: ;">';
echo '<tr><th colspan="2">Resident</th><th>Review Date</th><th>Medication</th>';

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
	 $stmt = $conn-> prepare("SELECT Res.FirstName, Res.LastName, Rev.ReviewDate, Med.GenericName 
	 	FROM Antipsychotic A, Review Rev, Resident Res, Medication Med 
	 	WHERE A.RevID = Rev.RevID 
	 	AND A.ResidentID = Res.ResidentID 
	 	AND A.MedID = Med.MedID;");
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