<?php

session_start();
if (!$_SESSION['user']) {
   header('location:../index.php');
}


require '../config/config.php';
$msg = "";
        
        if(isset($_POST['submit'])){
          $image = $_FILES['image']['name'];
          $target = "../views/images/".basename($image);
          $title=$_POST['title'];
          $created_on=$_POST['created_on'];
          $author=$_POST['author'];
          $category=$_POST['cat'];
          $body=$_POST['post'];
          $data="hey";
        $sql="INSERT into blog set title=?,body=?,author=?,created_on=?,updated_on=CURRENT_DATE,thumbnail=?,category=?";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "fail";
        }
        else{

         mysqli_stmt_bind_param($stmt,"ssssss",$title,$body,$author,$created_on,$image,$category);
         mysqli_stmt_execute($stmt);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  


        }}

    
 ?>

<!DOCTYPE html>
<html>
<head>

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet"><script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/summernote.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<style type="text/css">
    .note-editable { background-color: #262626 !important; 
    color: white !important;
    border-color: black}
    .panel-default > .panel-heading {
    background-color: #282828;
    border-color: black;
}
.dropdown-menu{
    background-color: #444444;
}


.dropdown-menu > li > a{
    color: white;
}
pre{
    color: black !important;
}

</style>

</head>

<header><nav class="navbar navbar-inverse" style="margin: 0 !important">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand" href="../index.php""> <img src="../pics/logo.png" height="30" width="30"> </a>
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
            <li><a href="#">Mobiles</a></li>
            <li><a href="#">Technology</a></li>
            <li><a href="#">Others</a></li>
           <!--  <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li> -->
          </ul>
        </li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav></header>


<body id="main" style="background-color: #0c0c0c">
<div id="loader">
<div class="spinner"></div> 
</div>

  
<div class="container"> 
<script>

$(document).ready(function() {

var IMAGE_PATH = '';
                  // the exact folder in the document_root
                  // will be provided by php script below

$('#summernote').summernote({
  
    height: 300,
    toolbar : [
        ['style'],
        ['font',['fontsize']],
        ['color',['color']],
        ['para',['ul','ol','paragraph']],
        ['link',['link']],
        ['picture',['picture']]
    ],
    callbacks : {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        },
         onMediaDelete : function(target,$editable) {
                 alert(target.attr('src')); 
                deleteFile(target[0].src);
            }


    }
});

function uploadImage(image) {
    var data = new FormData();
    data.append("image",image);
    $.ajax ({
        data: data,
        type: "POST",
        url: "uploader.php",// this file uploads the picture and 
                         // returns a chain containing the path
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            var image = IMAGE_PATH + url;
            $('#summernote').summernote("insertImage", image);
            },
            error: function(data) {
                console.log(data);
                }
        });
    }

    function deleteFile(src) {

    $.ajax({
        data: {src : src},
        type: "POST",
        url:'delete.php', // replace with your 
        cache: false,
        success: function(resp) {
            console.log(resp);
        }
    });
}

});
</script>
<form method="post" enctype="multipart/form-data" action="blog.php">
<label>Title</label><br>
<input type="text" name="title" style="margin-bottom: 30px;width: 100%;height: 40px;background-color: #262626;border:0"><br>
<label>Category</label><br>
<select name="cat" style="margin-bottom: 30px;width: 100%;height: 40px;background-color: #262626;border:0">
<option>Select Category</option>
  <option>mobiles</option>
  <option>technology</option>
  <option>others</option>
</select><br><br>
<label>Author</label><br>
<input type="text" name="author" style="margin-bottom: 30px;width: 100%;height: 40px;background-color: #262626;border:0">
<label>Created-on</label>
<input type="date" name="created_on" style="margin-bottom: 30px;width: 100%;height: 40px;background-color: #262626;border:0">
<label>Select Your Thumbnail Picture</label><br>
<input type="file" name="image"  ><br>
<textarea id="summernote" name="post"></textarea>
<input type="submit" name="submit" value="Post" style="color: white;background-color: red;width: 200px;height: 50px;border:0px">
</form>
</div>

<script type="text/javascript" src="../styles/style.js"></script>

</body>
</html>