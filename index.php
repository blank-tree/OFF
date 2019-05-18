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
				<div id="cam">
					<video onloadedmetadata="onPlay()" id="inputvideo" autoplay muted></video>
					<canvas id="overlay"></canvas>
				</div>
			</div>
		</div>
	</div>
	

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<button type="button" class="button large hollow" id="capture">Save Picture</button>
				<button type="button" class="button large hollow" style="display: none;" id="capture-cancel">Cancel</button>
				<button type="button" class="button large hollow" style="display: none;" id="upload">Upload</button>
			</div>
		</div>
	</div>

	



	<div class="grid-container" id="filter-selection">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				
				<ul class="tabs" data-tabs id="off-tabs">
					<li class="tabs-title is-active">
						<a href="#recognized" aria-selected="true">Person Recognized</a>
					</li>
					<li class="tabs-title">
						<a href="#detected" aria-selected="true">Person Detected</a>
					</li>
					<li class="tabs-title">
						<a href="#hidden" aria-selected="true">Person Hidden</a>
					</li>
				</ul>

				<?php

				$representation = 'static/img/representation/';
				$filter = 'static/img/filter/';
				$cleaner = array('.', '..', '.gitkeep', '.DS_Store');

				$recognized = array_diff(scandir($representation . 'recognized/', 1), $cleaner);
				$detected = array_diff(scandir($representation . 'detected/', 1), $cleaner);
				$hidden = array_diff(scandir($representation . 'hidden/', 1), $cleaner);

				?>

				<div class="tabs-content" data-tabs-content="off-tabs">
					<div class="tabs-panel is-active" id="recognized">
						<div class="grid-container">
							<div class="grid-x grid-padding-x grid-padding-y">
								<?php 
								$first = true;
								foreach($recognized as $item): ?>
									<div class="large-2 cell">
										<img src="<?= $representation . 'recognized/' . $item ?>"
											 alt="<?= pathinfo($item)['filename'] ?>" 
											 class="filter-element <?php if($first) {echo 'filter-element-selected'; $first = false; }?>"
											 data-filter="<?= $filter . 'recognized/' . $item ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="tabs-panel" id="detected">
						<div class="grid-container">
							<div class="grid-x grid-padding-x grid-padding-y">
								<?php foreach($detected as $item): ?>
									<div class="large-2 cell">
										<img src="<?= $representation . 'detected/' . $item ?>" 
										alt="<?= pathinfo($item)['filename'] ?>" 
										class="filter-element"
										data-filter="<?= $filter . 'detected/' . $item ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="tabs-panel" id="hidden">
						<div class="grid-container">
							<div class="grid-x grid-padding-x grid-padding-y">
								<?php foreach($hidden as $item): ?>
									<div class="large-2 cell">
										<img src="<?= $representation . 'hidden/' . $item ?>" 
										alt="<?= pathinfo($item)['filename'] ?>" 
										class="filter-element"
										data-filter="<?= $filter . 'hidden/' . $item ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>


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
