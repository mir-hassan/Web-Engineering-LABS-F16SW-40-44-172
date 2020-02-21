<?php 
    include 'connect.php';
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $uname = $_POST['uname'];
        
        $sql = "INSERT INTO users (`email`, `password`, `uname`) VALUES ('$email', '$password', '$uname')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($result) {
            header('location:index.php?status=success');
        }else {
            echo "Registration Error!!!";
        }


    }

?>