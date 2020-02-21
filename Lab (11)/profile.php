<?php 
    session_start();
    if(empty($_SESSION['name']))
    {
        header("location:index.php");
    }
    echo "Welcome ".$_SESSION['name']."<br>";


?>




<?php


    if (isset($_COOKIE['email'])) {
        echo "<br> <br>";
        echo "<h3>From Cookies</h3>";
        echo "Welcome ".$_COOKIE['uname']."<br>";
        echo "Email: ".$_COOKIE['email']."<br>";
        echo "Password: ".$_COOKIE['password']." ";
    }
?>

<a href="logout.php">Logout</a>