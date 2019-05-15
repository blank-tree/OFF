<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ObservationFailureFilter – Feed</title>
	<link rel="stylesheet" href="css/app.css">
</head>
<body>

	<?php

	include 'secret.php';

	$conn = new mysqli($DB_URL, $DB_USER, $DB_PW, $DB_NAME);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$uploads = $conn->query("SELECT * FROM offuploads");

	?>

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<h1>ObservationFailureFilter – Feed</h1>
			</div>
		</div>
	</div>


	<?php if($uploads->num_rows > 0): 
		$iterator = 0; ?>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php while($row = $uploads->fetch_assoc()):
				$iterator++;
				if($iterator > $MAX_DISPLAY - 1) {
					break; 
				} ?>
			
				<div class="large-4 small-12 cell">
					<img src="<?= $row["filename"] ?>"
						alt="<?= $row["uploadtimestamp"] ?>">
				</div>

			<?php endwhile; ?>
		</div>
	</div>

	<?php endif; ?>


	<?php
	$conn->close();
	?>


	<script src="js/modules/jquery.min.js"></script>
	<script src="js/modules/what-input.min.js"></script>
	<script src="js/modules/foundation.min.js"></script>
	<script src="js/modules/face-api.min.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
