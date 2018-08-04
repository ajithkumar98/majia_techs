<?php
include 'header.php';
require '../config/config.php';
$id=$_GET['id'];

$query="SELECT * FROM blog where id='$id'";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $blog) { ?>

<script type="text/javascript">
    document.title = "<?php echo $blog['title']; ?>"
</script>

<div id="blog-head-tile" style="height: 400px;width: 100%;background-size: contain;background-image: url(images/<?php echo $blog['thumbnail']; ?>);position: relative;background-position: center;background-attachment: fixed ;filter: blur(5px);background-repeat: no-repeat;background-size: cover;"></div>
<div style="height: 90px;width: 80%;background-color: #212121;position: absolute;top: 40%;box-shadow: 0 0 0 2px black" id="contenthead-tile">
<p style="text-align: center;color: white;position: relative;font-size: 40px;padding-top: 10px;" id="contenthead" > <?php echo $blog['title']; ?> </p></div>
</div>
<div class="container" style="width: 100%; padding: 15px;box-shadow: 0 0 20px 0 black;margin-top: 20px;margin-bottom: 10px;background-color: black">
<div class="container" style="padding: 15px;background-color: #111111">
<div style="border-bottom: 1px solid red">
<div style="font-size: 22px;font-weight:bolder;" id="blog-info"> Posted on : <?php echo $blog['created_on']; ?> in <?php echo $blog['category']; ?> </div>
<div style="font-size: 22px;font-weight:bolder;" id="blog-info"> By <?php echo $blog['author']; ?> </div><br></div>
	
	<div style="" id="blog-body" class="img-responsive"><?php echo $blog['body']; ?></div>
</div></div>
<?php }?>


<div class="container" style="margin-bottom: 20px" id="data">	
<div class="row">	

<h2 style="text-align: center;font-family: 'Nanum Pen Script', cursive;font-size: 60px" id="blog-other">Other posts you may like</h2><br>
<?php 
$query1="SELECT * FROM blog order by rand() limit 4";
$query_run1=mysqli_query($con,$query1);
foreach ($query_run1 as $info) {?>

<div class="col-md-3 col-xs-6" style="margin-bottom: 15px;border-bottom: 1px solid red;padding-bottom: 20px">      
      <form action="content.php" method="get" style="">
      <input type="hidden" value="<?php echo $info['id'];?>" name="id">
      <input type="hidden" value="<?php echo $info['title'];?>" name="title">
        <input id="blog-tile" style="background-image: url(images/<?php echo $info['thumbnail']; ?>);height: 150px;width: 290px;background-repeat: no-repeat;background-position: center;background-size: contain;background-color: black;border:0px" type="submit" value=" " >
      </form>
      <h3 id="related"><?php echo  substr($info['title'],0,15); ?>..</h3>
      <div id="related-info" style="color: lightgrey"> <?php echo $blog['created_on']; ?> | <?php echo $info['author']; ?></div>
</div>	


<?php } ?>
</div></div>

<!-- ***************************************************** -->

<?php

if (isset($_POST['submit1'])) {
			
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
	
			
}

?>


<div class="container" style="padding: 30px">	
<div class="row">	
<h2 style="padding-right: 20px">Comments</h2>

<form action="content.php?id=<?php echo $id; ?>" method="post">
<label>Name</label><br>
	<input id="blog-tile" type="text" name="name" placeholder="Enter your name" style="background-color: #3d3d3d;border:0px;color:white !important;width: 55%;height: 30px" required><br><br>
	<label>Comment</label><br>
	<textarea id="blog-tile" name="comment" style="background-color: #3d3d3d;border:0px;color:white !important;width: 55%;height: 100px" placeholder="Enter your comment" required></textarea><br><br>
	<input type="submit" value="Post Comment" name="submit1" style="background-color: red;color: white;height: 50px;width: 180px;border:0px">
	<input type="hidden" name="postid" value="<?php echo $id;?>">
</form><br><br>

<div style="border-bottom-width: 1px;border-color: white;border-bottom-style: solid"></div>

<?php
$blog_id=$id;		
		$sql="SELECT * FROM comments where blog_id=?";
		$stmt=mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "fail";
		}
		else{

		 mysqli_stmt_bind_param($stmt,"i",$blog_id);
		 mysqli_stmt_execute($stmt);
		 $query_run2=mysqli_stmt_get_result($stmt);
}

foreach ($query_run2 as $key) {?>

<!-- 
<div style="border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: white;padding-left: 30px" > -->

<div style="padding-top: 10px;padding-bottom: 5px">
<span style="font-size: 25px"><?php echo $key['name']; ?> | </span><span style="color: lightgrey"> commented on: <?php echo $key['created_on']; ?></span>

</div>
<div style="font-size: 15px"><?php echo $key['comment']; ?></div><br><br>
<?php } ?>


</div>
</div>	





</div></div>
<?php
require 'footer.php';
?>