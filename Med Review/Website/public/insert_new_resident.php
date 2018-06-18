<?php require_once('../../private/init.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstname = $_POST["FirstName"];
	$lastname = $_POST["LastName"];
	$medicare = $_POST["Medicare"];
	$dob = $_POST["DOB"];
	$facility = $_POST["Facility"];
	$admission = $_POST["Admission"];
	try {
		$success = insert_new_resident($firstname, $lastname, $medicare, $dob, $facility, $admission);
		insert_success($success[0], "");
		// redirect to resident view page upon successful insertion
		echo '<script> window.location.href = "'.url_to('/all_residents/resident/view.php?id='.h(u($success[1]))).'";</script>';

	} catch (PDOException $e) {
		insert_success(false, $e->getMessage());
	} 
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$firstname = "";
	$lastname = "";
	$medicare = "";
	$dob = "";
	$facility = "";
	$admission = "";
	echo $firstname;
}
$all_facilities = get_all_facilities("'%'", "'%'");
$facility_string = facility_options($all_facilities, $facility);
?>


<?php $page_title = 'Residents'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<header class='resident'>
	<?php echo $page_title ?>
</header>


<div id="content">
	<article id="resident">
		<form method="post" action="insert_new_resident.php" class="insert_resident">
			<table class="insert">
				<tr>
					<td><label>First Name:</label></td>
					<td><input class="insert" type="text" name="FirstName" id="FirstName" value='<?php echo $firstname; ?>'></td>
				</tr>
				<tr>
					<td><label>Last Name:</label></td>
					<td><input class="insert" type="text" name="LastName" id="LastName" value='<?php echo $lastname; ?>'></td>
				</tr>
				<tr>
					<td><label> Medicare:</label></td>
					<td><input class="insert" type="text" name="Medicare" id="Medicare" value='<?php echo $medicare; ?>'></td>
				</tr>
				<tr>
					<td><label>DOB:</label></td>
					<td><input class="insert" type="datetime" name="DOB" id="DOB" value='<?php echo $dob; ?>'></td>
				</tr>
				<tr>
					<td><label>Facility:</label></td>
					<td><select class="insert" name="Facility"><option value="">Select Facility</option><?php echo $facility_string; ?></select></td>
				</tr>
				<tr>
					<td><label>Admission Date:</label></td>
					<td><input class="insert" type="datetime" name="Admission" id="Admission" value='<?php echo $admission; ?>'></td>
				</tr>
			</table>
			<input class="submit" type="submit" value="Submit"/>
		</form>
	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>