<?php require_once('../../private/init.php'); ?>
<?php
$get = explode(",", isset($_GET['id']) ? $_GET['id'] : "1,1");
$id = $get[0]; // Resident.ResidentID
$rev = $get[1]; // Review.RevID

$res_info = get_resident_info($id);
$diagnoses = resident_Dx($id);
$medications = resident_Rx($rev);
$recommendations = get_recommendations($rev);
$dates = get_rev_dates($rev);
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
			<table class="resident_form">
				<td class="head">Referral Date:</td>
				<td class="info"><?php echo h($dates['ReferralDate']); ?></td>
				<td class="head">Review Date:</td>
				<td class="info"><?php echo h($dates['ReviewDate']); ?></td>
				<td><a class="action" href="<?php echo url_to('/review/edit_rev.php?id='.h(u($id)).','.h(u($rev)));?>">Edit</a></td>
			</table>
		</section>


		<section id="diagnosis">
			<p>Diagnoses:</p>
			<table class="resident_form">
				<?php echo disease_string($diagnoses); ?>
			</table>
		</section>

		<section id="medications">
			<p>Current medications: <a class="action" href="<?php echo url_to('/review/edit_rev.php?id='.h(u($id)).','.h(u($rev)));?>">Add</a></p>
			<table class="list">
				<tr>
					<th>Medication</th>
					<th>Form</th>
					<th>Strength</th>
					<th>Dose</th>
					<th>Frequency</th>
				</tr>
				<?php echo medication_string($medications); ?>
			</table>
		</section>

		<section id="reviews">
			<p>Recommendations: <a class="action" href="<?php echo url_to('/review/edit_rev.php?id='.h(u($id)).','.h(u($rev)));?>">Add</a></p>
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

			</table>
		</section>

	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>