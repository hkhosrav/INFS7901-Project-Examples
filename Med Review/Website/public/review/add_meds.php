<?php require_once('../../private/init.php'); 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		print_r($_POST);
		$id = $_POST["id"];
		$revID = $_POST["RevID"];
		$medID = $_POST["medication"];
		$dose = $_POST["Dose"];
		$freq = $_POST["Frequency"];
		try {
			$success = insert_new_medication($revID, $medID, $freq, $dose);
			update_success(true, "");
		} catch (PDOException $e) {
			insert_success(false, $e->getMessage());
		}
		echo '<script> window.location.href = "'.url_to('/review/index.php?id='.h(u($id)).','.h(u($revID))).'";</script>';
	}
?>