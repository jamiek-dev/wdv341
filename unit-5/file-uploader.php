<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>
</head>
<body>
    <?php if($uploaded = v_array('uploaded', $_GET)) { 
        if($uploaded != 1) { ?>
            <p style="color: red;">Upload Failed!</p>
    <?php } else { ?>
            <p style="color: green;">File Upload Successful!!!</p>
    <?php } 
    } ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <p>Upload File</p>
        <p><input type="file" name="file_to_upload" id="file-to-upload"></p>
        <p><input type="submit" value="Upload"></p>
    </form>
</body>
</html>