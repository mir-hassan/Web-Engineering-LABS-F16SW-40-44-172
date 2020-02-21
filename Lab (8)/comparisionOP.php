<?php

$num = 45;

$op = ($num > 30 || $num > 20 || $num > 10)? "$num is Greater then 10, 20 and 30": "$num is Less then 10, 20 and 30";

echo "Output: ".$op."<br>";


$a = 15;
$b = 27;
 

echo "<br>The number before swapping is: ";
echo "Number a =".$a." and b=".$b;

$temp = $a;
$a = $b;
$b = $temp;
 
echo "<br>The number after swapping is: ";
echo "Number a =".$a." and b=".$b."\n";
?>