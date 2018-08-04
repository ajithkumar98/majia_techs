<?php
require '../config/config.php';
require '../views/header.php';

?>

<?php
$query="SELECT * from  blog where id=6";
$query_run=mysqli_query($con,$query);
foreach ($query_run as $info) {?>

<div class="container">	

<h1> <?php echo $info['title']; ?> </h1>
<img src='images/<?php echo $info['thumbnail']; ?>' >
<div><?php echo $info['body']; ?></div>

</div>



<?php } ?>

<?php 	require 'footer.php' ?>