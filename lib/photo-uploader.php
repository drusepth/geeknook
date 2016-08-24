<?php require_once("../includes/global_header.php"); ?>

<?php

// Where the file is going to be placed 
$target_path = "../people/photos/";

$filename = basename( $_FILES['uploadedfile']['name']);
$extension = substr($filename, strrpos($filename, '.'));
$mvname = $_SESSION['ID'] . $extension;

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
$target_path = $target_path . $mvname; 

if ($extension != '.jpg' and $extension != '.gif' and $extension != '.png') {
	error("Only .png, .jpg, and .gif images are allowed.", "?p=register");
}

if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	notice("Your photo has been uploaded.", "?p=home");
} else {
	echo "There was an error uploading the file, please try again.";
}

?>