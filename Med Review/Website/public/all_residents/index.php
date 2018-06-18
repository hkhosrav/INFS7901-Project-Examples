<?php require_once('../../private/init.php'); ?>

<?php
	$lastname = empty($_POST["lastname"]) ? "'%'" : '"'.$_POST["lastname"].'"';
	$firstname = empty($_POST["firstname"]) ? "'%'" : '"'.$_POST["firstname"].'"';
	$facility = empty($_POST["facility"]) ? "'%'" : '"'.$_POST["facility"].'"';
	$all_residents = get_all_residents($lastname, $firstname, $facility);
?>

<?php $page_title = 'Residents'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<header class='resident'>
	<?php echo $page_title ?>
</header>

<div id="content">
	<article id="resident">
		<section id="resident_list">
			<table class="list">
				<tr>
					<th>ResidentID</th>
					<th>Last Name</th>
					<th>Name</th>
					<th>Medicare</th>
					<th>DOB</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($all_residents as $resident) { ?>
					<tr>
						<td><?php echo h($resident['ResidentID']); ?></td>
						<td><?php echo h($resident['LastName']); ?></td>
						<td><?php echo h($resident['FirstName']); ?></td>
					
						<td><?php echo h($resident['Medicare']); ?></td>
						<td><?php echo h($resident['DOB']); ?></td>
						<td><a class="action" href="<?php echo url_to('/all_residents/resident/view.php?id='.h(u($resident['ResidentID'])));?>">View</a></td>
						<td>
							<form method="post" action="delete_resident.php">
								<input type="hidden" name="residentID" id="residentID" value=<?php echo h($resident['ResidentID']); ?>>
								<input class="link" type="submit" value="Delete">
							</form>
						</td>
					</tr>
				<?php } ?>
			</table>
		</section>
	</article>
</div>


<?php include(SHARED_PATH . '/footer.php'); ?>


