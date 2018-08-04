<!DOCTYPE html>
<html>
<head>
	<title>Majia techs</title>
  <link rel="icon" type="image/png" href="pics/logo.jpg">
  <!-- 
************google analytics******* -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100564684-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap2.css">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<body id="main" class="pageType" >
<nav class="navbar navbar-inverse" style="margin: 0 !important">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand" href="index.php""> <img src="pics/logo.png" height="30" width="30"> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav">
        <li><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul> -->
    <!--   <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="views/mobile.php">Mobiles</a></li>
            <li><a href="views/technology.php">Technology</a></li>
            <li><a href="views/other.php">Others</a></li>
           <!--  <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li> -->
          </ul>
        </li>
        <li><a href="views/about.php">Our journey</a></li>
        <li><a href="views/aboutus.php">About Us</a></li>
        <li><a href="views/contact.php">Contact Us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- ************************************************* -->

<div id="loader">
<div class="spinner"></div> 
</div>


<div style="color: white" class="box">
	<div id="top"><div class="row col-xs-12" id="title" style="">MAJIA TECHS</div></div>
	<div id="bottom"><div style="font-family: 'Nanum Pen Script', cursive;font-size: 50px;text-align: center;position: relative;top: 40%;left: -65px;opacity: .5" id="bottom-text">scroll down</div> </div>


<div class="container" id="content" style="width: 100%;padding: 0px !important"> 
	 

<?php
require 'config/config.php'; 
?>


<h1 style="text-align: center;font-family: 'Nanum Pen Script', cursive;font-size: 60px">Recent Posts</h1><br><br>

<div class="container" style="box-shadow: 0 2px 0px 0px grey;padding-bottom: 20px">
  <div class="row">


<?php

$query= "SELECT * from blog order by created_on DESC limit 9";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $blog) {
?>

<div class="col-md-4 col-sm-12 cont-body" style="box-shadow: 0 2px 0 0px red;margin: 5px;width: 380px;" >
<form action="views/content.php" method="get">
      <input type="hidden" value="<?php echo $blog['id'];?>" name="id">
      <input type="hidden" value="<?php echo $blog['title'];?>" name="title">
        <input style="background-image: url(views/images/<?php echo $blog['thumbnail']; ?>);height: 200px;width: 380px;background-repeat: no-repeat;background-position: center;background-size: cover;background-color: black;border:0px;margin: -15px" type="submit" value=" ">
      </form>
      <h3 style=""><?php echo  substr($blog['title'],0,20); ?>...</h3>
      <div style="color: lightgrey"> <?php echo $blog['created_on']; ?> | <?php echo $blog['author']; ?></div>
      </div>
<?php } ?>

</div></div><br><br>
<!-- ************************************************* -->

<h1 style="text-align: center;font-family: 'Nanum Pen Script', cursive;font-size: 60px" id="index-title">Blogs you may like on Smartphones and mobiles</h1><br><br>

<div class="container" style="box-shadow: 0 2px 0px 0px grey;padding-bottom: 20px">
  <div class="row" >


<?php

$query= "SELECT * from blog where category='mobiles' or category='technology' order by rand() DESC limit 9";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $blog) {
?>

<div class="col-md-4 col-sm-12 cont-body" style="box-shadow: 0 2px 0 0px red;margin: 5px;width: 380px;" >
<form action="views/content.php" method="get">
      <input type="hidden" value="<?php echo $blog['id'];?>" name="id">
      <input type="hidden" value="<?php echo $blog['title'];?>" name="title">
        <input style="background-image: url(views/images/<?php echo $blog['thumbnail']; ?>);height: 200px;width: 380px;background-repeat: no-repeat;background-position: center;background-size: cover;background-color: black;border:0px;margin: -15px" type="submit" value=" ">
      </form>
      <h3><?php echo  substr($blog['title'],0,20); ?>...</h3>
      <div style="color: lightgrey"> <?php echo $blog['created_on']; ?> | <?php echo $blog['author']; ?></div>
      </div>
<?php } ?>

</div></div>
<br><br>



<!-- ************************************************* -->

<h1 style="text-align: center;font-family: 'Nanum Pen Script', cursive;font-size: 60px" id="index-title">Blogs you may like on Science and Technology</h1><br><br>

<div class="container" style="box-shadow: 0 2px 0px 0px grey;padding-bottom: 20px">
  <div class="row">


<?php

$query= "SELECT * from blog where category='others' or category='technology' order by rand() DESC limit 9";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $blog) {
?>

<div class="col-md-4 col-sm-12 cont-body" style="box-shadow: 0 2px 0 0px red;margin: 5px;width: 380px;" >
<form action="views/content.php" method="get">
      <input type="hidden" value="<?php echo $blog['id'];?>" name="id">
      <input type="hidden" value="<?php echo $blog['title'];?>" name="title">
        <input style="background-image: url(views/images/<?php echo $blog['thumbnail']; ?>);height: 200px;width: 380px;background-repeat: no-repeat;background-position: center;background-size: cover;background-color: black;border:0px;margin: -15px" type="submit" value=" ">
      </form>
      <h3><?php echo  substr($blog['title'],0,20); ?>...</h3>
      <div style="color: lightgrey"> <?php echo $blog['created_on']; ?> | <?php echo $blog['author']; ?></div>
      </div>
<?php } ?>

</div></div>




</div></div>







<footer class="footer">
  <div class="container" style="padding: 20px;" >
    <div class="row" style="margin: 0 auto;max-width: 900px">
      <div class="col-md-4">
           <h3 style="color: red;text-align: center;font-family: 'Nanum Pen Script', cursive;font-size: 40px">Find us on</h3>
              <ul style="color: white">
                <li><a href="https://www.facebook.com/majiatech/"  style="color: white">Facebook</a></li>
                <li><a href="https://www.instagram.com/majia_techs/" style="color: white"> Instagram</a></li>
              </ul>    
      </div>
      <div class="col-md-4">
            <h3 style="color: red;text-align: center;"><a href="views/contact.php" style="color: red;font-family: 'Nanum Pen Script', cursive;font-size: 40px"> Contact us</a></h3>
                <ul>  
                    <li>Phone : +917338895164</li>
                    <li>Email : majiatechs@gmail.com</li>
                </ul>
      </div>
      <div class="col-md-4">
        <h3 style="color: red;text-align: center;font-family: 'Nanum Pen Script', cursive;font-size: 40px" >Terms and services</h3>
        <ul>
          <li><a href="views/t&c.php" style="color: white">Terms and services</a></li>
        </ul>
      </div>

    </div>
  </div>
  
</footer>






<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>


<script type="text/javascript" src="styles/jquery.js"></script>
<script type="text/javascript" src="styles/style.js"></script>
<script type="text/javascript" src="styles/bootstrap.min.js"></script>
</body>
</html>