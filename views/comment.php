<?php
require '../config/config.php';
$name=  mysqli_real_escape_string($con,$_POST['name']);
$comment=mysqli_real_escape_string($con,$_POST['comment']);
$postid=mysqli_real_escape_string($con,$_POST['postid']);

$sql="INSERT INTO comments set name=?,comment=?,created_on=CURRENT_TIMESTAMP,blog_id=?";
$stmt=mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt,$sql)){
echo "fail";			
}
else{
 mysqli_stmt_bind_param($stmt,"sss",$name,$comment,$postid);
 mysqli_stmt_execute($stmt);
	}

?>