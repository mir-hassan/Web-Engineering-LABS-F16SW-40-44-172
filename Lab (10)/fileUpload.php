<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form enctype="multipart/form-data" method="post">
        <div class="form-group">
          <label class="custom-file">
            <input type="file" name="myFile" id="myFile" class="custom-file-input">
          </label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
    </form>

<?php

    if (isset($_GET['submit'])) {
        $tmp = $_FILES['myFile']['tmp_name'];
        $targetFile = "uploads/".$_FILES['myFile']['name'];
        echo $tmp."<br>".$targetFile."<br>";
        if (move_uploaded_file($tmp, $targetFile)) {
            echo "Uploaded Successfully!";
        }

    }

?>

</body>
</html>