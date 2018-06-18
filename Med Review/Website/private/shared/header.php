<!doctype html>

<html lang="en">

<head>
	<title><?php echo $page_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<link rel="stylesheet" media="all" href="<?php echo WWW_ROOT . '/stylesheets/home.css'; ?>" />
</head>

<body>

	<nav>
		<div class="grid-container">
			<div class="nav1">
			<img src="<?php echo WWW_ROOT. '/img/medirev.png'; ?>" style="height:60px;"></div>
			<div class="nav2">
			<a href="<?php echo url_to('/index.php'); ?>">HOME</a></div>
			<div class="nav3">
			<a href="<?php echo url_to('/all_residents/index.php'); ?>">RESIDENTS</a></div>
			<div class="nav4">
			<a href="<?php echo url_to('/all_facilities/index.php'); ?>">FACILITIES</a></div>
			<div class="nav5">
			<a href="<?php echo url_to('/all_doctors/index.php'); ?>">DOCTORS</a></div>
			<div class="nav6">
				<ul class="nav">
				<li>
					<input class="reports" id="all_reports" type="checkbox" name="menu">
					<label class="nav" for="all_reports">REPORTS</label>
						<ul class="submenu" id="nav">
							<li><p class="submenu">Drug use evaluations</p></li>
							<li><a href="<?php echo url_to('/reporting/antipsychotics.php'); ?>">Antipsychotic usage</a></li>

							<li><p class="submenu">Pharmacist Reports</p></li>
							<li><a href="<?php echo url_to('/reporting/reviews_completed.php'); ?>">Reports all completed</a></li>
							<li><a href="<?php echo url_to('/reporting/reviews_not_completed.php'); ?>">Reports not completed</a></li>
							<li><a href="<?php echo url_to('/reporting/pharm_max.php'); ?>">Highest review counts</a></li>
							<li><a href="<?php echo url_to('/reporting/pharm_min.php'); ?>">Lowest review counts</a></li>
							<li><a href="<?php echo url_to('/reporting/pharm_avg.php'); ?>">Average review counts</a></li>

							<li><p class="submenu">Doctor Reports</p></li>
							<li><a href="<?php echo url_to('/reporting/doctors_email.php'); ?>">Doctor emails</a></li>

							<li><p class="submenu">Facility Reports</p></li>
							<li><a href="<?php echo url_to('/reporting/managers_email.php'); ?>">Manager emails</a></li>
							<li><a href="<?php echo url_to('/reporting/facility_stats.php'); ?>">Bed number stats</a></li>

							<li><p class="submenu">Resident Reports</p></li>
							<li><a href="<?php echo url_to('/reporting/residents_without_reviews.php'); ?>">To be reviewed</a></li>
						</ul>
				</li>
			</div>
		</div>
	</nav>


</div>

