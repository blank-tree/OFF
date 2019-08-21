<!doctype html>
<html class="no-js" lang="de">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ObservationFailureFilter</title>
	<link rel="stylesheet" href="css/app.css">
</head>
<body>

	<?php
	require_once('elements/header.php');
	?>

	<div id="main-container-off">

		<div id="main-wrapper" class="grid-x">

			<div id="off-cam" class="cell small-7">
				<div id="cam">
					<video onloadedmetadata="onPlay()" id="inputvideo" autoplay muted></video>
					<canvas id="overlay"></canvas>
					<div id="upload-confirmation">
						<p>Dein Bild ist nun im Archiv einsehbar.</p>
					</div>
				</div>
				<div class="grid-x">
					<div id="buttons" class="cell small-4">
						<button type="button" class="button expanded hollow" id="capture">Save Picture</button>
						<button type="button" class="button expanded hollow" style="display: none;" id="capture-cancel">Cancel</button>
						<button type="button" class="button expanded hollow" style="display: none;" id="upload">Upload</button>
					</div>
					<div id="warning" class="cell small-8">
						<p>Durch Bestätigung des «Upload» Buttons, erklären Sie sich damit einverstanden,<br> Ihr Foto mit dem von Ihnen gewählten Filter, auf offfffffffffff.xyz für alle einsehbar online zu stellen.</p>
					</div>
				</div>
			</div>

			<div id="off-filters" class="cell small-5">
				<ul class="tabs" data-tabs id="off-tabs">
					<li class="tabs-title is-active">
						<a href="#recognized" aria-selected="true"><img src="static/img/recognized.svg" alt="Recognized" class="off-icon">Person Recognized</a>
					</li>
					<li class="tabs-title">
						<a href="#detected" aria-selected="true"><img src="static/img/detected.svg" alt="Detected" class="off-icon">Person Detected</a>
					</li>
					<li class="tabs-title">
						<a href="#hidden" aria-selected="true"><img src="static/img/hidden.svg" alt="Hidden" class="off-icon">Person Hidden</a>
					</li>
				</ul>

				<?php

				$representation = 'static/img/representation/';
				$filter = 'static/img/filter/';
				$filterFileExtension = '.png';
				$cleaner = array('.', '..', '.gitkeep', '.DS_Store');

				$recognized = array_diff(scandir($representation . 'recognized/', 0), $cleaner);
				$detected = array_diff(scandir($representation . 'detected/', 0), $cleaner);
				$hidden = array_diff(scandir($representation . 'hidden/', 0), $cleaner);

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
										class="filter-element"
										id="<?php if($first) {echo 'filter-element-selected';}?>">
										<img src="<?= $filter . 'recognized/' . pathinfo($item)['filename'] . $filterFileExtension ?>"
										alt="<?= pathinfo($item)['filename'] ?>" 
										class="filter-img"
										id="<?php if($first) {echo 'current-filter'; } ?>">
										<p><img src="static/img/recognized.svg" alt="Recognized" class="off-icon"><?= pathinfo($item)['filename'] ?></p>
									</div>
									<?php if($first) {$first = false;} ?>
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
										class="filter-element">
										<img src="<?= $filter . 'detected/' . pathinfo($item)['filename'] . $filterFileExtension ?>"
										alt="<?= pathinfo($item)['filename'] ?>" 
										class="filter-img" >
										<p><img src="static/img/detected.svg" alt="Detected" class="off-icon"><?= pathinfo($item)['filename'] ?></p>
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
										class="filter-element">
										<img src="<?= $filter . 'hidden/' . pathinfo($item)['filename'] . $filterFileExtension ?>"
										alt="<?= pathinfo($item)['filename'] ?>" 
										class="filter-img" >
										<p><img src="static/img/hidden.svg" alt="Hidden" class="off-icon"><?= pathinfo($item)['filename'] ?></p>
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
