<?php require_once('../../../private/init.php'); ?>
<?php
$id = isset($_GET['id']) ? "'".$_GET['id']."'" : '1'; // get ResidentID
$res_info = get_resident_info($id); // SQL query on Resident for ResidentID
$diagnoses = resident_Dx($id);
$medications = latest_resident_Rx($id);
$reviews = all_resident_reviews($id);
$num_reviews = get_num_reviews($id);
// echo json_encode($reviews); // error checking
?>

<?php $page_title = 'Resident Details'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<header class='resident'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="resident">

		<a class="back-link" href="<?php echo url_to('/all_residents/index.php'); ?>">&laquo; Residents List</a>

		<section id="resident_details">
			<p class="resident_form">Resident Details:</p>
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

		<section id="diagnosis">
			<p class="resident_form">Diagnoses:</p>
			<table class="resident_form">
				<?php echo disease_string($diagnoses); ?>
			</table>
		</section>

		<section id="medications">
			<p class="resident_form">Current medications:</p>
			<table class="list">
				<?php echo medication_string($medications); ?>
			</table>
		</section>

		<section id="reviews">
			<p class="resident_form">Residential Medication Management Reviews: (<?php echo $num_reviews[0]["COUNT(*)"]; ?>)</p>
			<table class="list">
				<tr>
					<th colspan="2">Doctor</th>
					<th>Referral Date</th>
					<th>Review Date</th>
					<th colspan="2">Pharmacist</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($reviews as $review) { ?>
					<tr>
						<td><?php echo h($review['D_First']); ?></td>
						<td><?php echo h($review['D_Last']); ?></td>
						<td><?php echo h($review['ReferralDate']); ?></td>
						<td><?php echo h($review['ReviewDate']); ?></td>
						<td><?php echo h($review['P_First']); ?></td>
						<td><?php echo h($review['P_Last']); ?></td>
						<td><a class="action" href="<?php echo url_to('/review/index.php?id='.h(u($review['ResidentID'])).','.h(u($review['RevID'])));?>">View</a></td>
					</tr>
				<?php } ?>

			</table>
		</section>

	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
