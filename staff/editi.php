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
<div class="card"><?php while($row2 = mysqli_fetch_assoc($result)){ ?>
	<form method="POST" action = "reg.php">
	
    Item Name</br>
       <input class="input"  type="text" name = "itemname"  value = "<?=$row2["itemName"]?>" required>
        </br>
    <a>Item Price</a> </br>
       <input class="input"  type="text" name = "itemprice" value = "<?=$row2["itemPrice"]?>" required>
         </br>
	<a>Item Description</a></br>  
       <input class="input"  type="text" name = "desc"  value = "<?=$row2["itemDesc"]?>" required></a>
         </br>
	<a>Category</a></br>  
        <select class ="input" name = "category">
        	<option selected value="<?=$row2["categ"]?>"><?=$row2["categ"]?></option>
        	<option value = "wogel">Wogel</option>
        	<option value = "scarf">Scarf</option>
          <option value = "belt">Belt</option>
          <option value = "misc">Misc</option>
        </select>
		</br></br>
	<a>Item image link</a></br>  
       <input class="input"  type="text" name = "img"  value = "<?=$row2["imglink"]?>" ></a>
         </br>
    <?php  }  ?>
        <input type = "hidden" name = "id" value = <?=$num?>>
         <input class="btn" type ="submit" class  = "btn" name = "submit" id ="submit" value="Submit">
         <a href = "uimage.php?id=<?=$num?>" style ="text-decoration:none; font-size:12px;" class = "btn">Upload image</a>
   </form>
  </div>
</div>
</body>
</html>