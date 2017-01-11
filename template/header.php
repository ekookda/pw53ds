<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php if(isset($_GET['page'])) echo strtoupper($_GET['page']); else echo "PW53DS"; ?></title>
    <?php if (!isset($_SESSION['user'])) { ?>
    	<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
    	<link rel="stylesheet" href="assets/css/style.css">
    <?php } else { ?>
    	<link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css" />
    	<link rel="stylesheet" href="../assets/css/style.css">
    <?php } ?>
</head>
<body>
<div class="container">
<!-- navigation section -->
<section class="navbar navbar-fixed-top custom-navbar navbar-custom" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">HOME</a>
		</div>

		<?php if (!isset($_SESSION['user'])) { ?>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="register.php?page=register" class="smoothScroll">Registrasi</a></li>
				<li><a href="login.php?page=login" class="smoothScroll">Login</a></li>
			</ul>
		</div>

		<?php } else { ?>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="register.php?page=register" class="smoothScroll">Registrasi</a></li> -->
				<li><a href="../logout.php" class="smoothScroll"><i class="glyphicon glyphicon-user"></i> Logout</a></li>

			</ul>
		</div>

		<?php } ?>

	</div>
</section>
