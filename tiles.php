
<?php
require 'config/config.php'; 
?>

<div class="container">
	<div class="row" id="data">

<?php

$query=	"SELECT * from blog";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $blog) {
?>

<div class="col-md-6 col-sm-12 cont-body">
			<img id="pic2" class="nshowing" src="pics/thumb.jpg" style="width: 100%"><br>
			<a href="google.com">ha</a>
			</a>
			</div>
<?php } ?>

</div></div>

<!-- <h1>RECENT POSTS</h1>
<div class="container">
	 <div class="row" id="data">

		<div class="col-md-6 col-sm-12 cont-body">
			<img id="pic2" class="nshowing" src="pics/thumb.jpg" style="width: 100%"><br>
			<a href="test" class="ajaxify" data-target="test">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</a>
			</div>


		<div class=" col-md-6 col-sm-12 cont-body">
			<a href="test" class="ajaxify" data-target="test"><img class="nshowing" src="pics/thumb.jpg" style="width: 100%"></a><br>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>

			<div class="col-md-6 col-sm-12 cont-body">
			<img id="pic2" class="nshowing" src="pics/thumb.jpg" style="width: 100%"><br>
			<a href="test" class="ajaxify" data-target="test">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</a>
			</div>


		<div class=" col-md-6 col-sm-12 cont-body">
			<a href="test" class="ajaxify" data-target="test"><img class="nshowing" src="pics/thumb.jpg" style="width: 100%"></a><br>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>

			<div class="col-md-6 col-sm-12 cont-body">
			<img id="pic2" class="nshowing" src="pics/thumb.jpg" style="width: 100%"><br>
			<a href="test" class="ajaxify" data-target="test">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</a>
			</div>


		<div class=" col-md-6 col-sm-12 cont-body">
			<a href="test" class="ajaxify" data-target="test"><img class="nshowing" src="pics/thumb.jpg" style="width: 100%"></a><br>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>
		
		</div></div> -->