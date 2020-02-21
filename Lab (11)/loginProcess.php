<?php 
    include 'connect.php';
    session_start();
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


        foreach ($result as $row) {
            
            if(!empty($_POST["rem"])) {
                $_SESSION['name'] = $row['uname'];
                setcookie ("email",$row["email"],time()+ 3600);
                setcookie ("password",$row["password"],time()+ 3600);
                setcookie ("uname",$row["uname"],time()+ 3600);
                echo "Cookies Set Successfuly";
                header('location:profile.php?cookies=set');
            } else {
                setcookie("username","");
                setcookie("password","");
                $_SESSION['name'] = $row['uname'];
                header('location:profile.php?cookies=unset');
                
            }
 
             
        }


    }

?>