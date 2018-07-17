<?php
//header.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Car Inventory Management System</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">Car Inventory Management System</h2>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					
					<ul class="nav navbar-nav">
					<li><a href="#" data-toggle="modal" data-target="#categoryModal">Add Manufacturer</a></li>
						<li><a href="category.php" data-toggle="modal" data-target="#brandModal" id="add_button">Add Model</a></li>
						<li><a href="#" data-toggle="modal" data-target="#productModal">Add Model Details</a></li>
						
					

				</div>
			</nav>
			