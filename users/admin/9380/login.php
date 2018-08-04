<?php
session_start();
require '../../../config/config.php';
require 'header.php';
?>

<?php

if(isset($_POST['submit'])){
	$name=$_POST['username'];
	$password=  md5($_POST['password']);
     $pin=md5($_POST['pin']);


	$query="SELECT * FROM user where username='$name' and password='$password' and pin='$pin'";
	$query_run=mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0){
		echo "sucess";
		header('location:../../../users/blog.php');
		$_SESSION['user']=$name;
	}
	else{
		echo "fail";
	}
}

?>
<div class="container" style="text-align: center;padding-top: 40px;color: black">	
<div class="row">	
		<h3>ADMIN LOGIN</h3>
<form action="login.php" method="post">
<label>Username</label><br>
	<input type="text" name="username" placeholder="Enter your username" style="width: 400px;height: 30px" required><br><br>
	<label>Password</label><br>
	<input type="password" name="password" placeholder="Enter your password" style="width: 400px;height: 30px" required><br><br>
	<label>PIN</label><br>
	<input type="number" name="pin" placeholder="Enter your 6 digit pin" style="width: 400px;height: 30px" required><br><br>
	<input type="submit" name="submit" style="width: 200px;height: 50px;background-color: red;border:0px;color: white">
</form>

</div>	
</div>	
<div style="height: 200px"></div>
<?php
require 'footer.php'

?>