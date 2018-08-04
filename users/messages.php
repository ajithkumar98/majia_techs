<?php
session_start();
if (!$_SESSION['user']) {
   header('location:../index.php');
}
require '../views/header.php';
require '../config/config.php';
?>

<div class="container">
	<h1 style="text-align: center;">Messages</h1>

<?php

$query="SELECT * FROM message";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $info) {
?>

<ol>
	<li> 
	<div> <?php echo $info['name']; ?> </div>
	<div> <?php echo $info['message']; ?> </div>
	<div> <?php echo $info['created_on']; ?> </div>

	 </li>
</ol>

<?php } ?>





</div>

<div style="height: 200px"></div>
<?php
require '../views/footer.php';
?>