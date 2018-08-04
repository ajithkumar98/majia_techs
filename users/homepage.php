<?php
session_start();
if (!$_SESSION['user']) {
   header('location:../index.php');
}
require '../views/header.php';
?>
<div class="container" style="text-align: center;margin-top:200px ">	
<a href="blog.php">
<button style="color: white;background-color: red;width: 200px;height: 50px;border:0px">Post a blog</button></a><br><br>


<a href="messages.php">
<button style="color: white;background-color: red;width: 200px;height: 50px;border:0px">Messages</button></a>
</div><br><br>

<form method="post" style="text-align: center;" action="../index.php">
	<button name="logout" value="Log out" style="color: white;background-color: red;width: 200px;height: 50px;border:0px">Log out</button>
</form>
</div>

<?php
if (isset($_POST['logout'])) {
	session_destroy();

}

?>



<div style="height: 200px"></div>
<?php
require '../views/footer.php';
?>