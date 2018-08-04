<?php
require 'header.php';
require '../config/config.php';
?>
<script type="text/javascript">
    document.title = "Contact us"
</script>

<?php
if(isset($_POST['submit'])){

$name=  mysqli_real_escape_string($con,$_POST['email']);
$subject=  mysqli_real_escape_string($con,$_POST['subject']);
$message=  mysqli_real_escape_string($con,$_POST['body']);

		
		$sql="INSERT INTO message set name=?,subject=?,message=?,created_on=CURRENT_DATE";
		$stmt=mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "fail";
		}
		else{

		 mysqli_stmt_bind_param($stmt,"sss",$name,$subject,$message);
		 mysqli_stmt_execute($stmt);

		}



}

?>

<div class="container">
<div class="row">


<h1 style="text-align: center;">Contact us</h1><br><br>

<div class="col-sm-6" style="border-right: 1px solid red">
<h3 style="text-align: center;color: red" >Fell free to share your opinions</h3><br>
<form action="contact.php" method="post" style="color: black">
<label>Email-id</label><br>
	<input type="text" name="email" placeholder="Enter your email" style="width: 400px;height: 30px" required><br><br>
	<label>Subject</label><br>
	<input type="text" name="subject" placeholder="Enter the subject" style="width: 400px;height: 30px" required><br><br>
	<label>Message</label><br>
	<textarea name="body" placeholder="Enter ypur message" style="width: 400px;height: 200px" required></textarea><br><br>
<input type="submit" name="submit" value="Message us" class="button" style="width: 200px;height: 50px;background-color: red;border:0px;color: white">
</form>
</div>

<div class="col-sm-6" style="text-align: center;">
	<h3 style="color: red">Email us at : </h3>
	<h4>majiatechs@gmail.com</h4><br>
	<h3 style="color: red">Contact us at :</h3>
	<h4>+917338895164</h4><br>
	<h3 style="color: red">For buisness purpose</h3>
	<h4>ajithbmwkumar@gmail.com</h4><br>
	<h3 style="color: red">Our Terms and Services</h3>
	<a href="t&c.php">
	<button style="width: 200px;height: 50px;background-color: red;border:0px;color: white">Click Here</button></a>

</div>


</div></div>
<div style="height: 100px"></div>

<?php
require 'footer.php';
?>