<div>Would you like to upload a picture?</div>
<br />

<form enctype="multipart/form-data" action="lib/photo-uploader.php" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
	Choose a photo of yourself: <input name="uploadedfile" type="file" /><br />
	<input type="submit" value="Upload File" />
</form>