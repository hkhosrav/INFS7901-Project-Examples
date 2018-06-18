<?php require_once('../../private/init.php'); 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$revDate = $_POST["ReviewDate"];
		$revID = $_POST["RevID"];
		$refDate = $_POST["ReferralDate"];
		$id = $_POST["id"];
		$success = update_review_date($revID, $revDate, $refDate);
		update_success($success[0], $success[1]);
		echo '<script> window.location.href = "'.url_to('/review/index.php?id='.h(u($id)).','.h(u($revID))).'";</script>';
	}
?>
