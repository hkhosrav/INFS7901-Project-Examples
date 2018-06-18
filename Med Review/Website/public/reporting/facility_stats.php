<?php require_once('../../private/init.php'); ?>
<?php
	$min = get_min_bed_num();
	$max = get_max_bed_num();
	$avg = get_avg_bed_num();
?>

<?php $page_title = 'Facility - Bed Number Stats'; ?>
<?php include(SHARED_PATH . '/header.php');?>

<header class='report'>
	<?php echo $page_title ?>
</header>

<div id="main">
	<table class="list">
		<tr>
			<th>Maximum</th>
			<th>Minimum</th>
			<th>Average</th>
		</tr>
			<tr>
				<td><?php echo $max[0]["max"] ?></td>
				<td><?php echo $min[0]["min"] ?></td>
				<td><?php echo $avg[0]["avg"] ?></td>
			</tr>
	</table>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
