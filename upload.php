<?php
include 'secret.php';

define('UPLOAD_DIR', 'uploads/');

$current_timestamp = time();
$img = $_POST['img'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.jpeg';
$success = file_put_contents($file, $data);

if ($success) {
	// https://www.w3schools.com/php/php_mysql_prepared_statements.asp

    // Create connection
	$conn = new mysqli($DB_URL, $DB_USER, $DB_PW, $DB_NAME);

    // Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    // prepare and bind
	$stmt = $conn->prepare("INSERT INTO offuploads (filename, uploadtimestamp) VALUES (?, ?)");
	$stmt->bind_param("ss", $file, $uploadtimestamp);

    // set parameters and execute
	$filename = $target_file;
	$uploadtimestamp = $current_timestamp;
	$stmt->execute();

	$stmt->close();
	$conn->close();
} else {
	print 'Unable to save the file.';
}

?>