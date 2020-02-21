<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task no. 2</title>
</head>
<body>
<form action="" method="post">
        <div class="form-group">
          <label for="Uname">Enter Name:</label>
          <input type="text" class="form-control" name="uName" id="uName" placeholder="e.g., Ali Mujtaba">
        </div>
        <br>
        <div class="form-group">
          <label for="uPhone">Enter Phone No.</label>
          <input type="number" class="form-control" name="uPhone" id="uPhone" placeholder="e.g., 03333333333">
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Update List</button>
    </form>


    <?php
        
        if (isset($_POST['submit'])) {
            $name = $_POST['uName'];
            $phone = $_POST['uPhone'];
            $fp = fopen('data.txt', 'a'); 
            fwrite($fp, "Name: ".$name."\n <br>Phone:".$phone."\n <br><br>");  
            fclose($fp);  
            
            echo "File appended successfully! <br>";  
            
            

        }
        if ($fh = fopen('data.txt', 'r')) {
            while (!feof($fh)) {
                $line = fgets($fh);
                echo $line;
            }
            fclose($fh);
        }
    
    
    ?>
</body>
</html>