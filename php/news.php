<?php
$con=new mysqli('localhost','root','','backend');

$sql1="Select * from news where newsid='1'";
$result1=mysqli_query($con,$sql1);
if($result1){
    while($row1 = $result1->fetch_assoc()) {
        $id1=$row1["newsid"];
        $title1=$row1["title"];
        $content1=nl2br($row1["content"]);
        $img1=$row1["img"];
        $blob1=$row1["imgfile"];
        
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
        $blob2=$row2["imgfile"];
        
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
        $blob3=$row3["imgfile"];
        
        }
}

$sql4="Select * from news where newsid='4'";
$result4=mysqli_query($con,$sql4);
if($result4){
    while($row4 = $result4->fetch_assoc()) {
        $id4=$row4["newsid"];
        $title4=$row4["title"];
        $content4=$row4["content"];
        $img4=$row4["img"];
        $blob4=$row4["imgfile"];
        
        }
}

$sql5="Select * from news where newsid='5'";
$result5=mysqli_query($con,$sql5);
if($result5){
    while($row5 = $result5->fetch_assoc()) {
        $id5=$row5["newsid"];
        $title5=$row5["title"];
        $content5=$row5["content"];
        $img5=$row5["img"];
        $blob5=$row5["imgfile"];
        
        }
}

?>