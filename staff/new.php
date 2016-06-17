<?php include 'include/check.php';
include '../include/db.php';
$sql2 = "SELECT * FROM category";
$result2 = mysqli_query($connect,$sql2);

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
<h1>New Item Registration</h1>
<div class="card">
	<form method="POST" action = "reg.php">
	
    Item Name</br>
       <input class="input"  type="text" name = "itemname"  required>
        </br>
    <a>Item Price</a> </br>
       <input class="input"  type="text" name = "itemprice"  required>
         </br>
	<a>Item Description</a></br>  
       <input class="input"  type="text" name = "desc"  required></a>
         </br>
	<a>Category</a></br>  
        <select class ="input" name = "category">
        	<?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
          <option value = "<?=$row2['name'];?>"><?=$row2['name'];?></option>
        
          <?php } ?>
        </select>
		</br></br>
	
    
         <input class="btn" type ="submit" class  = "btn" name = "submit" id ="submit" value="Submit">
   </form>
  </div>
</div>
</body>
</html>