<?php
$con=new mysqli('localhost','root','','backend');

if($con){
    echo "yes!";
}else{
    die(mysqli_error($con));
}
?>