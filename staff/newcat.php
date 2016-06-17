<?php include 'include/check.php';?>
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
<h1>New Category Registration</h1>
<div class="card">
	<form method="POST" action = "catreg.php">
	
    Category Name</br>
       <input class="input"  type="text" name = "catname"  required>
        </br>
  
	<a>Category Description</a></br>  
       <input class="input"  type="text" name = "cdesc"  required></a>
         </br>

		</br></br>
	
    
         <input class="btn" type ="submit" class  = "btn" name = "submit" id ="submit" value="Submit">
   </form>
  </div>
</div>
</body>
</html>