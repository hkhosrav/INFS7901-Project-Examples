<?php require_once('../../private/init.php'); ?>
<?php
	$avg = get_pharm_avg_reviews();
?>

<?php $page_title = 'Pharmacists - Average Review Numbers'; ?>
<?php include(SHARED_PATH . '/header.php');?>

<header class='report'>
	<?php echo $page_title ?>
</header>

<div id="main">
	<table class="list">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Number of Reviews</th>
		</tr>
		<?php foreach($avg as $pharm) { ?>
			<tr>
				<td><?php echo h($pharm["FirstName"]); ?></td>
				<td><?php echo h($pharm["LastName"]); ?></td>
				<td><?php echo h($pharm["num"]); ?></td>
			</tr>
		<?php } ?>
	</table>

	
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>