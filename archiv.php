<!doctype html>
<html class="no-js" lang="de">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ObservationFailureFilter – Archiv</title>
	<link rel="stylesheet" href="css/app.css">
</head>
<body>

	<?php
	include('secret.php');
	require_once('elements/header.php');
	?>

	<div id="main-container-archive">

		<div id="main-wrapper" class="grid-x grid-padding-x">

			<?php

			if (isset($_GET['pageno'])) {
				$pageno = $_GET['pageno'];
			} else {
				$pageno = 1;
			}
			
			$no_of_records_per_page = 52;
			$offset = ($pageno-1) * $no_of_records_per_page;

			// Create connection
			$conn = new mysqli($DB_URL, $DB_USER, $DB_PW, $DB_NAME);

		    // Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$total_pages_sql = "SELECT COUNT(*) FROM offuploads";
			$result = mysqli_query($conn,$total_pages_sql);
			$total_rows = mysqli_fetch_array($result)[0];
			$total_pages = ceil($total_rows / $no_of_records_per_page);
			$result = $conn->query("SELECT * FROM offuploads ORDER BY offuploads.uploadtimestamp DESC LIMIT $offset, $no_of_records_per_page");
			?>

			<?php while($row = $result->fetch_assoc()): ?>
				<div class="cell small-12 medium-6 large-3">
					<img src="<?= $row['filename']; ?>" alt="<?= $row['uploadtimestamp'] ?>">
					<p><?= date("d/m/Y H:i:s" , $row['uploadtimestamp']); ?></p>
				</div>
			<?php endwhile;
			$conn->close();
			?>
		</div>

		<div class="grid-x">
			<div class="cell small-12" style="text-align: center;">
				<ul class="pagination">
					<li><a href="?pageno=1">First</a></li>
					<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
						<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
					</li>
					<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
						<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
					</li>
					<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
				</ul>
			</div>
		</div>

	</div>


	<script src="js/modules/jquery.min.js"></script>
	<script src="js/modules/what-input.min.js"></script>
	<script src="js/modules/foundation.min.js"></script>
	<script src="js/modules/face-api.min.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
