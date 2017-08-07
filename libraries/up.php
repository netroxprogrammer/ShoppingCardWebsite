<?php
class Upload{
	
	function uploadImage(){
	
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
	
					if ($_FILES["file"]["error"] > 0) {
						echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					} else {
					//	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
						//echo "Type: " . $_FILES["file"]["type"] . "<br>";
						//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
						//echo "Temp file: " . $_FILES["file"]["name"] . "<br>";
						if (file_exists("upload/" . $_FILES["file"]["name"])) {
						//	echo $_FILES["file"]["name"] . " image name  already exists. ";
						} else {
							move_uploaded_file($_FILES["file"]["tmp_name"],
							"" . $_FILES["file"]["name"]);
							//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	}
}
	return  "http://new.zaryabinstruments.com/wp-content/uploads/wpcf7_uploads/" . $_FILES["file"]["name"];
				}
			//
	
}
?>