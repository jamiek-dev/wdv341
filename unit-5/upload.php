<?php include 'functions.php'; ?>
<?php 
$file_data = $_FILES['file_to_upload'];
$tmp_name = $file_data['tmp_name'];
$file_name = $file_data['name'];
$destination = 'uploads';

$file_uploaded = move_uploaded_file($tmp_name, "$destination/$file_name");
$uploaded = $file_uploaded ?: 0;

header("Location: file-uploader.php?uploaded=$uploaded");
?>