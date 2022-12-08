<?php 
	if($_FILES["file"]["error"]>0){
		echo "Error: ".$_FILES["file"]["error"]."<br>";

	}
	else{
		//echo "Đã upload file: ".$_FILES["file"]["name"];
		//save file den upload
		move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/".$_FILES["file"]["name"]);
		echo $_FILES["file"]["name"];
	}
?>