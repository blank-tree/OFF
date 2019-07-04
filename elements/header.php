<?php
$s = $_SERVER['PHP_SELF'];
?>

<div id="off-menu">
	<ul>
		<li class="<?= $s == '/index.php' ? 'active-menu' : '' ?>"><a href="/">OFF–Trial</a></li>
		<li class="<?= $s == '/archiv.php' ? 'active-menu' : '' ?>"><a href="/archiv.php">Archiv</a></li>
		<li class="<?= $s == '/info.php' ? 'active-menu' : '' ?>"><a href="/info.php">Info</a></li>
	</ul>
</div>
