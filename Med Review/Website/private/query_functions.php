<?php require_once('functions.php'); ?>

<?php

// Get all data for each resident as well as their facility
// Select only from Resident table if facility is set to 'any'
function get_all_residents($lastname, $firstname, $facility) {
	global $db;
	if ($facility == "'%'") {
		$sql = "SELECT *
		 FROM Resident
		 WHERE LastName LIKE $lastname AND 
	  	  FirstName LIKE $firstname
	  	 ORDER BY LastName";
	} else {
		$sql = "SELECT R.*
	 FROM Resident R, ResidentHome RH, Facility F
	 WHERE R.ResidentID = RH.ResidentID AND
	  RH.RACID = F.RACID AND
	  R.LastName LIKE $lastname AND 
	  R.FirstName LIKE $firstname AND 
	  F.Name LIKE $facility
	 ORDER BY R.LastName";
	}

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get resident names and the name of their facility
function resident_names_facilities() {
	global $db;

	$sql = "SELECT R.ResidentID, R.LastName, R.FirstName, F.Name
	 FROM Resident R, ResidentHome RH, Facility F
	 WHERE R.ResidentID = RH.ResidentID AND RH.RACID = F.RACID 
	 ORDER BY R.LastName";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;

}

// Get all information on the resident as well as the facility name, organisation and admission date for their current facility
function get_resident_info($id) {
	global $db;

	$sql = "SELECT R.*, F.Organisation, F.Name, H.AdminDate 
	 FROM Resident R, ResidentHome H, Facility F
	 WHERE R.ResidentID = $id
	  AND H.ResidentID = R.ResidentID
	  AND H.RACID = F.RACID
	  AND H.AdminDate =
		(SELECT Max(H2.AdminDate)
		 FROM ResidentHome H2
		 WHERE H2.ResidentID = R.ResidentID)";
	$result = $db->query($sql);
	$array = $result->fetch(PDO::FETCH_ASSOC);
	return $array;
}

// Get all data on the facilities
function get_all_facilities($organisation, $name) {
	global $db;

	$sql = "SELECT * FROM Facility
	 WHERE Organisation LIKE $organisation AND Name LIKE $name
	 ORDER BY Organisation";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get organisation names without duplication
function get_all_organisations() {
	global $db;

	$sql = "SELECT DISTINCT Organisation FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get all doctor details as the name of the clinic they are in
function get_all_clinics_doctors($firstname, $lastname, $clinic) {
	global $db;

	$sql = "SELECT D.*, C.Name
	 FROM Doctor D, Clinic C
	 WHERE C.ClinicID = D.ClinicID
	  AND D.FirstName LIKE $firstname
	  AND D.LastName LIKE $lastname
	  AND C.Name LIKE $clinic";
	 $result = $db->query($sql);
	 $array = $result->fetchALL(PDO::FETCH_ASSOC);
	 return $array;
}

// Get count of reviews a resident has had
function get_num_reviews($id) {
	global $db;

	$sql = "SELECT COUNT(*)
	 FROM Review
	 WHERE ResidentID = $id";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get a diagnosis list for a specific resident by ResidentID
function resident_Dx($id) {
	global $db;

	$sql = "SELECT Disease From ResidentDx
	 WHERE ResidentID = $id";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get the medication list from the most recent review for a specific resident
function latest_resident_Rx($id) {
	global $db;

	$sql = "SELECT Med.GenericName, COALESCE(O.Formulation, T.Formulation, I.Administration) AS Form, Med.Strength, Rx.Dose, Rx.Frequency
		FROM Review Rev1, ResidentRx Rx, Resident Res, Medication Med
		 LEFT JOIN Oral O ON O.MedID = Med.MedID
		 LEFT JOIN Topical T ON T.MedID = Med.MedID
		 LEFT JOIN Injectable I ON I.MedID = Med.MedID
		WHERE Res.ResidentID = $id
		 AND Rev1.RevID = Rx.RevID
		 AND Res.ResidentID = Rev1.ResidentID
		 AND Rx.MedID = Med.MedID 
		 AND Rev1.ReviewDate = (
			SELECT MAX(Rev2.ReviewDate)
			FROM Review Rev2
			WHERE Rev1.ResidentID = Rev2.ResidentID)";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get the medication list for a specific review based on RevID
function resident_Rx($rev) {
	global $db;

	$sql = "SELECT Med.GenericName, COALESCE(O.Formulation, T.Formulation, I.Administration) AS Form, Med.Strength, Rx.Dose, Rx.Frequency
	FROM Review Rev1, ResidentRx Rx, Medication Med
	 LEFT JOIN Oral O ON O.MedID = Med.MedID
	 LEFT JOIN Topical T ON T.MedID = Med.MedID
	 LEFT JOIN Injectable I ON I.MedID = Med.MedID
	WHERE Rev1.RevID = $rev
	 AND Rev1.RevID = Rx.RevID
	 AND Rx.MedID = Med.MedID";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get referral and review dates
function get_rev_dates($rev) {
	global $db;

	$sql = "SELECT ReferralDate, ReviewDate
	 FROM Review
	 WHERE RevID = $rev";

	$result = $db->query($sql);
	$array = $result->fetch(PDO::FETCH_ASSOC);
	return $array;
}
// Get details including doctors and pharmacist names for all the reviews a resident has received
function all_resident_reviews($id) {
	global $db;

	$sql = "SELECT D.FirstName AS D_First, D.LastName AS D_Last, 
		 R.ReferralDate, R.ReviewDate, R.RevID, Res.ResidentID,
		 P.FirstName AS P_First, P.LastName AS P_Last
	 	FROM Doctor D, Pharmacist P, Review R, Resident Res
	 	WHERE Res.ResidentID = $id
	  	 AND Res.ResidentID = R.ResidentID
	  	 AND D.DoctorID = R.DoctorID
	  	 AND P.PharmID = R.PharmID
	  	ORDER BY R.ReferralDate DESC";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// Get the recommendations associated with a reviews
function get_recommendations($rev) {
	global $db;

	$sql = "SELECT Title, Information, Options
		FROM Recommendation
		WHERE RevID = $rev";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// get pharmacist with minimum number of reviews
function get_pharm_min_reviews() {
	global $db;

	$sql = "SELECT P.FirstName, P.LastName, y.num FROM Pharmacist P, (
		SELECT PharmID, COUNT(*) as num FROM Review group by PharmID) as y 
		WHERE P.PharmID = y.PharmID 
		AND y.num = (
			SELECT MIN(x.num) FROM (
				SELECT COUNT(*) as num FROM Review GROUP BY PharmID) as x);";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// get pharmacist with maximum number of reviews
function get_pharm_max_reviews() {
	global $db;

	$sql = "SELECT P.FirstName, P.LastName, y.num FROM Pharmacist P, (
		SELECT PharmID, COUNT(*) as num FROM Review group by PharmID) as y 
		WHERE P.PharmID = y.PharmID 
		AND y.num = (
			SELECT MAX(x.num) FROM (
			SELECT COUNT(*) as num FROM Review GROUP BY PharmID) as x);";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// get pharmacists with the average numbers of reviews
function get_pharm_avg_reviews() {
	global $db;

	$sql = "SELECT P.FirstName, P.LastName, y.num FROM Pharmacist P, (
	SELECT PharmID, COUNT(*) as num FROM Review group by PharmID) as y 
	WHERE P.PharmID = y.PharmID AND y.num = (
	SELECT ROUND(AVG(x.num)) FROM (
	SELECT COUNT(*) as num FROM Review GROUP BY PharmID) as x)";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// get maximum facility bed numbers
function get_max_bed_num() {
	global $db;

	$sql = "SELECT MAX(BedNumber) AS max FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// get minimum facility bed numbers
function get_min_bed_num() {
	global $db;

	$sql = "SELECT MIN(BedNumber) AS min FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// get average facility bed numbers
function get_avg_bed_num() {
	global $db;

	$sql = "SELECT ROUND(AVG(BedNumber)) AS avg FROM Facility";
	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// insert a new resident and associate with a facility
function insert_new_resident($firstname, $lastname, $medicare, $dob, $facility, $admission) {
	global $db;

	// use "BEGIN" and "COMMIT" clause to rollback any changes in event of an error
	$sql = "BEGIN";
	$db->query($sql);

	// insert into Resident
	// prepared statement
	$stmt = $db->prepare("INSERT INTO Resident (ResidentID, FirstName, LastName, Medicare, DOB) 
		VALUES (:ResidentID, :FirstName, :LastName, :Medicare, :DOB)");
	
	//bind parameters
	$stmt->bindParam(':ResidentID', $residentid);
	$stmt->bindParam(':FirstName', $firstname);
	$stmt->bindParam(':LastName', $lastname);
	$stmt->bindParam(':Medicare', $medicare);
	$stmt->bindParam(':DOB', $dob);
	
	//execute query
	$success = $stmt->execute();

	// get the PK for newly created record
	$id = $db->lastInsertId();

	// insert details into ResidentHome
	$stmt = $db->prepare("INSERT INTO ResidentHome (ResidentID, RACID, AdminDate)
		VALUES (:ResidentID, :RACID, :AdminDate)");
	$stmt->bindParam(':ResidentID', $id);
	$stmt->bindParam(':RACID', $facility);
	$stmt->bindParam(':AdminDate', $admission);
	$success = $stmt->execute();

	$sql = "COMMIT";
	$db->query($sql);

	return array($success, $id);
}

// Attempt to delete a resident based on resident id
function delete_resident($id) {
	global $db;

	$sql = "DELETE FROM Resident WHERE ResidentID = $id";
	$db->query($sql);
}

// Update a review date, ensuring that the review date is after the referral date
// check is done at this level aswell in the case that the check constraint is not performed depending on the mysql version
function update_review_date($revID, $revDate, $refDate) {
	global $db;

	$dateRev = strtotime($revDate);
	$dateRef = strtotime($refDate);

	if ($dateRev > $dateRef) {
		try {
			$sql = "BEGIN";
		$db->query($sql);

		$stmt = $db->prepare("UPDATE Review 
			SET ReviewDate = :revDate
			WHERE RevID = :revID");

		$stmt->bindParam(':revDate', $revDate);
		$stmt->bindParam(':revID', $revID);

		$success = $stmt->execute();

		$sql = "COMMIT";
		$db->query($sql);

		return array($success, "");

		} catch (PDOException $e) {
			return array(false, $e->getMessage());
		}

	} else if ($dateRev < $dateRef) {
		return array(false, "Review date must be after referral date");
	}
}

// get all medications
function get_all_medications() {
	global $db;

	$sql = "SELECT Med.*, COALESCE(O.Formulation, T.Formulation, I.Administration) AS Form
	FROM Medication Med
	 LEFT JOIN Oral O ON O.MedID = Med.MedID
	 LEFT JOIN Topical T ON T.MedID = Med.MedID
	 LEFT JOIN Injectable I ON I.MedID = Med.MedID";

	$result = $db->query($sql);
	$array = $result->fetchALL(PDO::FETCH_ASSOC);
	return $array;
}

// insert a new medication into a residents Rx for a specific review
function insert_new_medication($revID, $medID, $freq, $dose) {
	global $db;

	// use "BEGIN" and "COMMIT" clause to rollback any changes in event of an error
	$sql = "BEGIN";
	$db->query($sql);

	// insert into Resident
	// prepared statement
	$stmt = $db->prepare("INSERT INTO ResidentRx
		VALUES (:RevID, :MedID, :Frequency, :Dose)");
	
	//bind parameters
	$stmt->bindParam(':RevID', $revID);
	$stmt->bindParam(':MedID', $medID);
	$stmt->bindParam(':Frequency', $freq);
	$stmt->bindParam(':Dose', $dose);
	
	//execute query
	$success = $stmt->execute();

	$sql = "COMMIT";
	$db->query($sql);

	return $success;
}

// insert new review recommendation
function insert_recommendation($revID, $title, $info, $option) {
	global $db;

	$sql = "BEGIN";
	$db->query($sql);

	$stmt = $db->prepare("INSERT INTO Recommendation
		VALUES (:title, :revID, :info, :option)");

	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':revID', $revID);
	$stmt->bindParam(':info', $info);
	$stmt->bindParam(':option', $option);

	$success = $stmt->execute();

	$sql = "COMMIT";
	$db->query($sql);

	echo "Success";

	return $success;
}

?>
