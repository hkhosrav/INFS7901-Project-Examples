
<?php require_once('../../private/init.php'); 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST["residentID"];
		echo $id;
		try {
			$success = delete_resident($id);
			echo $success;
			delete_success(true, "");
			echo '<script> window.location.href = "'.url_to('/all_residents/index.php').'";</script>';
		} catch (PDOException $e) {
			echo "catching";
			delete_success(false, $e->getMessage());
			echo '<script> window.location.href = "'.url_to('/all_residents/index.php').'";</script>';
		} 
	}
?>