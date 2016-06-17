<?php
 include 'include/check.php';
include '../include/db.php';
$num = $_GET['id'];
$sql = "SELECT * FROM item where num = '$num'";
$result = mysqli_query($connect,$sql);  
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="../include/style.css">
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; //include($_SERVER['DOCUMENT_ROOT'].'/../include/header_navbar.php');?>

<div class="content">
<h1>Update Item</h1>

	
	
   <form action="upload.php" method="post" enctype="multipart/form-data">
            <br><br>Select image to upload:
            <input type="file" name="fileToUpload"  id="fileToUpload">
            <input type="submit" class = "btn" value="Upload Image" name="submit">
            <input type ="hidden" name ="id" value = "<?= $num; ?>"></form><br>
         

    
  </div>
</div>
</body>
</html>