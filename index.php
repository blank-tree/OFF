<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ObservationFailureFilter</title>
	<link rel="stylesheet" href="css/app.css">
</head>
<body>

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<h1>ObservationFailureFilter</h1>
			</div>
		</div>
	</div>


	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<div style="position: relative" class="margin">
					<video onloadedmetadata="onPlay()" id="inputVideo" autoplay muted></video>
					<canvas id="overlay"></canvas>
				</div>
				<canvas id="captureoverlay" width="640" height="480"></canvas>
			</div>
		</div>
	</div>
	

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<button type="button" class="button large hollow" id="capture">Capture!</button>
				<button type="button" class="button large hollow" id="capture-cancel">Cancel</button>
				<button type="button" class="button large hollow" id="upload">Upload</button>
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
