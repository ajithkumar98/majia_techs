<?php

      
$image = ($_FILES['image']['name']);
$uploaddir = '../views/images/';
      // that's the directory in the document_root where I put pics
$uploadfile = $uploaddir . basename($image);
if( move_uploaded_file($_FILES['image']['tmp_name'],$uploadfile)) {
    echo$uploadfile;
} else {
    echo "Lo kol kakh tov..."; // <= nobody is perfect :)
}
?>
