<?php
	session_start();
	
	
	// echo 'The session ID is:' . session_id();
	$number_of_tries = 0;
	if(!isset($_SESSION['user_new'])) {
		$_SESSION['user_new'] = 0;
		// echo 'Created Session';
	} else {
		$number_of_tries = $_SESSION['user_new'];
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Project - Diego Andrade</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery-3.5.1.min.js"></script>	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">My Favorite Movies</h2>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<a href="table.php" class="btn btn-primary btn-block">View All Records</a>
			</div>
		</div>
		
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php 
					if ($number_of_tries < 3) {
				?>
				<form action="table.php" method="post">
					<?php
						if (!isset($_SESSION['has_error'])) {
					?>
						<div id="fg-name" class="form-group">
							<label for="name">Movie Name</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Ex.: Highlander">
							<span id="hb-name" class="help-block hide-element">
								This field cannot be empty!
							</span>
						</div>
					<?php
						} else {
					?>
						<div id="fg-name" class="form-group has-error">
							<label for="name">Movie Name</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Ex.: Highlander">
							<span id="hb-name" class="help-block">
								This field cannot be empty!
							</span>
						</div>
					<?php
						unset($_SESSION['has_error']);
					}
					?>
					
					<div class="form-group">
						<label for="rating">Rating</label>
						<select class="form-control" name="rating" id="rating">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<hr>
					<input type="submit" class="btn btn-primary" id="btn-submit" value="Submit">
				</form>
				<?php 
					} else {
				?>
				<p class="bg bg-danger">
						You have reached the maximum of 3 submission for this session. Please return later.
				</p>
				<?php 
					}
				?>
			</div>
		</div>
	</div>
	<script src="js/main.js"></script>
</body>
</html>