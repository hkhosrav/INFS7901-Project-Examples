<?php require_once('../../private/init.php'); ?>
<?php
	$doctor_name = empty($_POST["doctor"]) ? '"% %"' : '"'.$_POST["doctor"].'"';
	$clinic = empty($_POST["clinic"]) ? "'%'" : '"'.$_POST["clinic"].'"';
	$names= explode(" ",$doctor_name);
	$firstname = $names[0].'"';
	$lastname = '"'.$names[1];

	$doctor_details = get_all_clinics_doctors($firstname, $lastname, $clinic);

?>

<?php $page_title = 'Doctors'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<header class='doctor'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="doctors">
		<section id="doctor_list">

			<table class="list">
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Provider No.</th>
					<th>Clinic</th>
				</tr>

				<?php foreach($doctor_details as $doctor) { ?>
					<tr>
						<td><?php echo h($doctor['DoctorID']); ?></td>
						<td><?php echo h($doctor['FirstName']); ?></td>
						<td><?php echo h($doctor['LastName']); ?></td>
						<td><?php echo h($doctor['ProviderNumber']); ?></td>
						<td><?php echo h($doctor['Name']); ?></td>
					</tr>
				<?php } ?>


			</table>
		</section>
		
	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>