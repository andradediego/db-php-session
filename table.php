<?php


	

	$mysqli = new mysqli('localhost', 'root', '', 'db_php');
	
	session_start();
	
	$post_times = 0;
	if(isset($_SESSION['user_new'])) {
		$post_times = $_SESSION['user_new'];
	}
	

	if ($post_times < 3) {
		if (isset($_POST['name']) && isset($_POST['rating'])) {
			$name = htmlentities($_POST['name']);
			if ($name == '') {
				$_SESSION['has_error'] = true;
				header("Location:index.php");
			}

			$rate = htmlentities($_POST['rating']);
			
			$insert = "INSERT INTO `movies` (`name`, `rating`) VALUES ('" . $name . "', " . $rate . ")";
	
			$result = mysqli_query($mysqli, $insert);
			if($result) {
				$_SESSION['user_new'] = $post_times + 1;
			}
		}
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
			<?php
				if (isset($_POST['name']) && isset($_POST['rating'])) {
			?>
				<p class="bg bg-success">
					Your entry was successfully inserted!
				</p>
			<?php
				}
			?>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Rating</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM `movies` ORDER by 1 desc";
							$result = mysqli_query($mysqli, $sql);
							while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['id'] ?><br></td>
								<td><?php echo $row['name'] ?><br></td>
								<td><?php echo $row['rating'] ?><br></td>
								<td><?php echo $row['reg_date'] ?><br></td>
							</tr>
						<?php
							}							
						?>
					</tbody>
				</table>
			</div>
			<hr>
			<a href="index.php" class="btn btn-primary">Back</a>
		</div>
	</div>
</body>
</html>