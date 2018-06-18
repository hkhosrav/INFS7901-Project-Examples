<?php require_once('../../private/init.php'); ?>
<?php
$get = explode(",", isset($_GET['id']) ? $_GET['id'] : "1,1");
$id = $get[0];
$rev = $get[1];

$res_info = get_resident_info($id);
$diagnoses = resident_Dx($id);
$medications = resident_Rx($rev);
$recommendations = get_recommendations($rev);
$dates = get_rev_dates($rev);

$all_medications = get_all_medications();
$medication_options_string = medication_options_string($all_medications);
?>

<?php $page_title = 'Residential Medication Management Review'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<header class='review'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="resident">

		<a class="back-link" href="<?php echo url_to('/all_residents/resident/view.php?id='.h(u($id)));?>">&laquo; Resident Details</a>


		<section id="resident_details">
			<p>Resident Details:</p>
			<table class="resident_form">
			<tr>
				<td class="head">Name:</td>
				<td class="info" colspan="2"><?php echo h($res_info['FirstName']); ?> <?php echo h($res_info['LastName']); ?></td>
				<td class="head">DOB:</td>
				<td class="info"><?php echo h($res_info['DOB']); ?></td>
				<td class="head">Medicare:</td>
				<td class="info"><?php echo h($res_info['Medicare']); ?></td>
			</tr>
			<tr>
				<td class="head">Facility:</td>
				<td class="info" colspan="2"><?php echo h($res_info['Name']); ?></td>
				<td class="head">Organisation:</td>
				<td class="info"><?php echo h($res_info['Organisation']); ?></td>
				<td class="head">Admission Date:</td>
				<td class="info"><?php echo h($res_info['AdminDate']); ?></td>
			</tr>
		</table>
		</section>

		<section id="review_details">
			<p>Review Details:</p>
			<form method="post" action="process_edit.php">
			<table class="resident_form">
				<td class="head">Referral Date:</td>
				<td class="info"><?php echo h($dates['ReferralDate']); ?></td>
				<td class="head">Review Date:</td>
				<td class="info">
					<input class="edit" type="datetime" name="ReviewDate" id="ReviewDate" value='<?php echo h($dates['ReviewDate']);?>'>
				</td>
				<td>
					<input type="hidden" name="RevID" id="RevID" value="<?php echo $rev ?>">
					<input type="hidden" name="ReferralDate" id="ReferralDate" value="<?php echo h($dates['ReferralDate']); ?>">
					<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
					<input class="link" type="submit" value="Save" style="color: blue; padding-bottom: 15px; background: none;">
				</td>
			</table>
		</form>
		</section>


		<section id="diagnosis">
			<p>Diagnoses:</p>
			<table class="resident_form" action="process_edit.php">
				<?php echo disease_string($diagnoses); ?>
			</table>
		</section>

		<section id="medications">
			<form method="post" action="add_meds.php">
			<p>Current medications: 
				<input class="link" type="submit" value="Save" style="color: blue; padding-bottom: 15px; background: none;">
				<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
				<input type="hidden" name="RevID" id="RevID" value="<?php echo $rev ?>"></p>
			<table class="list">
				<tr>
					<th>Medication</th>
					<th>Form</th>
					<th>Strength</th>
					<th>Dose</th>
					<th>Frequency</th>
				</tr>
				<?php echo medication_string($medications); ?>
				<td colspan="3">
					<select class="insert" name="medication"><option value="">Select Medication</option><?php echo $medication_options_string; ?></select>
				</td>
				<td>
					<input class="edit" type="text" name="Dose" id="Dose">
				</td>
				<td>
					<input class="edit" type="text" name="Frequency" id="Frequency">
				</td>
			</table>
		</form>


		</section>

		<section id="reviews">
			<form method="post" action="add_rec.php">
			<p>Recommendations: 
				<input class="link" type="submit" value="Save" style="color: blue; padding-bottom: 15px; background: none;">
				<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
				<input type="hidden" name="RevID" id="RevID" value="<?php echo $rev ?>"></p>
			<table class="list">
				<tr>
					<th>Title</th>
					<th>Information</th>
					<th>Options</th>
				</tr>
				<?php foreach($recommendations as $rec) { ?>
					<tr>
						<td><?php echo h($rec['Title']); ?></td>
						<td><?php echo h($rec['Information']); ?></td>
						<td><?php echo h($rec['Options']); ?></td>
					</tr>
				<?php } ?>
				<tr>
					<td><input class="edit" type="text" name="Title" id="Title"></td>
					<td><input class="edit" type="text" name="Info" id="Info"></td>
					<td><input class="edit" type="text" name="Option" id="Option"></td>
				</tr>

			</table>
		</section>

	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>