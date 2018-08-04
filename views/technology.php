<?php
require 'header.php';
require '../config/config.php';
?>

<div class="container" style="margin-bottom: 100px;margin-top: 70px;width: 90%" id="data" >
<div class="row">

<h1 style="text-align: center;padding-bottom: 40PX">TECHNOLOGY</h1>
<?php
// define how many results you want per page
$results_per_page = 10;
// find out the number of results stored in database
$sql="SELECT * FROM blog where category='technology'";
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);
// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} 
else {
  $page = $_GET['page'];

}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql="SELECT * FROM blog where category='technology' LIMIT " . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);
foreach ($result as $info) { ?>

<div class="col-md-3" style="box-shadow: 0 2px 0 0px red;margin-bottom: 10px;padding-bottom: 10px;margin-right: 5px;width: 330px">      
      <form action="content.php" method="get" style="">
      <input type="hidden" value="<?php echo $info['id'];?>" name="id">
      <input type="hidden" value="<?php echo $info['title'];?>" name="title">
        <input style="background-image: url(images/<?php echo $info['thumbnail']; ?>);height: 150px;width: 330px;background-repeat: no-repeat;background-position: center;background-size: contain;background-color: black;border:0px" type="submit" value=" ">
      </form>
       <h3><?php echo  substr($info['title'],0,20); ?>...</h3>
      <div style="color: lightgrey"> <?php echo $info['created_on']; ?> | <?php echo $info['author']; ?></div>
</div>	

<?php
}?>
</div></div>
<div class="container" style="padding:20px;color: red;font-size:15px;text-align:center">
<?php
// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '
	<span><a style="color: red;text-align: center" href="technology.php?page=' . $page . '">' . $page . '</a>| </span>

';
}
?>
</div>
<?php
require 'footer.php';
?>