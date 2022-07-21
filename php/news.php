<?php
$con=new mysqli('localhost','root','','backend');

$sql1="Select * from news where newsid='1'";
$result1=mysqli_query($con,$sql1);
if($result1){
    while($row1 = $result1->fetch_assoc()) {
        $id1=$row1["newsid"];
        $title1=$row1["title"];
        $content1=$row1["content"];
        $img1=$row1["img"];
        
        }
}

$sql2="Select * from news where newsid='2'";
$result2=mysqli_query($con,$sql2);
if($result2){
    while($row2 = $result2->fetch_assoc()) {
        $id2=$row2["newsid"];
        $title2=$row2["title"];
        $content2=$row2["content"];
        $img2=$row2["img"];
        
        }
}

$sql3="Select * from news where newsid='3'";
$result3=mysqli_query($con,$sql3);
if($result3){
    while($row3 = $result3->fetch_assoc()) {
        $id3=$row3["newsid"];
        $title3=$row3["title"];
        $content3=$row3["content"];
        $img3=$row3["img"];
        
        }
}

?>