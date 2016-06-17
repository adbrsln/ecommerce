<?php session_start(); ?>
<?php
//include 'include/check.php';
include 'include/db.php';
if (isset($_GET["item"])) {
   	$i = $_GET["item"]; 
	$query="SELECT * FROM item WHERE num = '$i'";
}else{
	$i = $_GET["cat"]; 
	$query="SELECT * FROM item WHERE categ = '$i'";

	 if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['qty']++; 
              
			echo '<script>var r = confirm("Succesfully Added to cart! Go to Cart ?");if (r == true) { window.location = "customer/cart.php";} else {window.location = "item.php?cat='; echo $i; echo '";}</script>';
        }else{ 
              
            $sql_s="SELECT * FROM item 
                WHERE num={$id}"; 
            $query_s=mysqli_query($connect,$sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['num']]=array( 
                        "qty" => 1, 
                        "price" => $row_s['itemPrice'] 
                    ); 
                  
              
					
					 echo '<script>var r = confirm("Succesfully Added to cart! Go to Cart ?");if (r == true) { window.location = "customer/cart.php";} else {window.location = "item.php?cat='; echo $i; echo '";}</script>';
					
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 

}

$result=mysqli_query($connect,$query);
$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="include/style.css">

</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; ?>

<div class="content">

<h1><?php echo strtoupper(substr($i, 0, 1)) ;echo substr($i,1);?></h1>


	  <?php while($row2 = mysqli_fetch_assoc($result)){ ?>
	 <table>
	 	
	 	
	 	<tr class = "card" height = "200">
		 	<td width = "10%" valign="top"><?php echo '<img src="./image/';echo $row2['imglink'];echo '" alt="skaf berlogo" height="250" width="200">'?></td>
		 	<td width = "60%" valign="top"><h1> <?php echo $row2['itemName']; ?></h1>Product Code : SK0<?php echo $row2['num']; ?><br>Item Description</br></br><?php echo $row2['itemDesc']; ?></td>
		 	<td width = "20%" valign="top"><center>MYR <?php echo $row2['itemPrice'];echo '.00'?><br><br><br><br><a  style = "text-decoration:none;" class ="btn"  href="item.php?cat=<?php echo $row2['categ'] ?>&action=add&id=<?php echo $row2['num'] ?>">Add to Cart</a></center></td>
		 	
	 	</tr>
	 	
	 	
	 	
	 </table>
	  <?php  }  ?> 
	  <input type = "hidden" name = "id" value = "<?php echo $i ?>">

</div>
</body>
</html>