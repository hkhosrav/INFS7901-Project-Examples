<?php require_once('../../private/init.php'); 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		print_r($_POST);
		$id = $_POST["id"];
		$revID = $_POST["RevID"];
		$title = $_POST["Title"];
		$info = $_POST["Info"];
		$option = $_POST["Option"];
		try {
			$success = insert_recommendation($revID, $title, $info, $option);
			update_success(true, "");
		} catch (PDOException $e) {
			insert_success(false, $e->getMessage());
		}
		echo '<script> window.location.href = "'.url_to('/review/index.php?id='.h(u($id)).','.h(u($revID))).'";</script>';
	}
?>