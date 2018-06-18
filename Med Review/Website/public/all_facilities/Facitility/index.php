<?php require_once('../../private/init.php'); ?>
<?php
	$organisation = empty($_POST["organisation"]) ? "'%'" : '"'.$_POST["organisation"].'"';
	$name = empty($_POST["facility_name"]) ? "'%'" : '"'.$_POST["facility_name"].'"';
	$all_facilities = get_all_facilities($organisation, $name);
?>

<?php $page_title = 'Facilities'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<header class='facility'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="facility">
		<section id="facility_list">
			<table class="list">
				<tr>
					<th>RACID</th>
					<th>Organisation</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Bed Number</th>
					<th>Email</th>
					<th>Clinical Coordinator</th>
					<th>Address</th>
				</tr>
				<?php foreach($all_facilities as $facility) { ?>
					<tr>
						<td><?php echo h($facility["RACID"]); ?></td>
						<td><?php echo h($facility["Organisation"]); ?></td>
						<td><?php echo h($facility["Name"]); ?></td>
						<td><?php echo h($facility["Phone"]); ?></td>
						<td><?php echo h($facility["BedNumber"]); ?></td>
						<td><?php echo h($facility["Email"]); ?></td>
						<td><?php echo h($facility["CCFirstName"].' '.$facility["CCLastName"]); ?></td>
						<td><?php echo h($facility["StreetAddress"].' '.$facility["Suburb"].' '.$facility["State"].' '.$facility["PostCode"]); ?></td>
					</tr>
				<?php } ?>
			</table>
		</section>
	</article>
</div>
