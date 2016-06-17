<?php session_start(); 
include 'include/check.php';
include '../include/db.php';
$num = $_SESSION['cnum'];
  $sql2 = "SELECT * FROM details WHERE loginID = '$num'";
   $login2 = mysqli_query($connect,$sql2);
    while($row = mysqli_fetch_assoc($login2)){
          $uid = $row['num'];
             }
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="/projekweb/include/style.css">
	<script>


function confirmation() {
  
    var r = confirm("Place Order?");
    if (r == true) {
        return true ;
    } else {
        return false;
    }
    
}

        function del(){
        var r = confirm("Are you sure to cancel this order?");
            if (r == true) {
               return true;
            } else {
               return false;
            }
        }
  
</script>
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; ?>

<div class="content">
<h1>Order Summary</h1>
<form method = "POST"  onsubmit= "return confirmation()" action = "p_proses.php">
 
		</br>
	 <table class = "tbl" style="text-align: center;">
	<tr>
        	<th>Item</th>
        	<th>Quantity</th>
        	<th>Price per unit</th>
        	<th>Price</td>	
        </tr>
	 <?php 
       
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM item WHERE num IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY itemName ASC"; 
        $query=mysqli_query($connect,$sql); 
        $total = 0; $totalb = 0;
        while($row=mysqli_fetch_array($query)){ 
              $price = $_SESSION['cart'][$row['num']]['price'];
              $qty = $_SESSION['cart'][$row['num']]['qty'];
              $subtotal = $price * $qty;
              $total+= $subtotal;
              $totalb += $qty;

        ?> 
        
        <tr> 
	         <td>
				<?php echo $row['itemName'] ?>
			</td>
			<td>
				<?php echo $_SESSION['cart'][$row['num']]['qty'] ?>
			</td>
			<td>
				RM <?php echo $price; ?>
			</td> 
			<td>RM <?php echo $subtotal?></td> 
		</tr> 
        <?php 
              
        } 


               if ($totalb > 4 && $totalb < 11){
                 $discount = 5;
                }
                else if($totalb > 10){
                    $discount = 15;
                    }
                else $discount = 0;
                
                 if($total > 100){
                        $pos = 'Your Postage is Free';
                        }
                    else $pos = 'You have to pay RM 10 to cover the postage Fees';
    ?>
    <tr>
        <td></td>
        <td></td>

        <td colspan = "2">
             Discount :<strong><?= $discount?>%</strong>
            <input type ="hidden" name = "discount" value ="<?= $discount?>">
        </td>
    </tr> 
    <tr>
        <td></td>
        <td></td>

        <td colspan = "2">
            Total Discount :<strong>RM <?php  $totaldisc = $total * ($discount/100); echo round($totaldisc,2);?></strong>
            <input type ="hidden" name = "totaldiscount" value ="<?= $totaldisc?>">
        </td>
    </tr> 
    <tr>
        <td></td>
        <td></td>

        <td colspan = "2">
            Total you have to pay :<strong>RM <?= round($total - $totaldisc,2);?></strong>
            <input type ="hidden" name = "ftotal" value ="<?= round($total - $totaldisc,2);?>">
        </td>
    </tr>
    <tr>
        

        <td colspan = "4">
            Postage :<strong>  <?= $pos?></strong>
            <input type ="hidden" name = "pos" value ="<?= $pos?>">
        </td>
    </tr>

    </table>
        <br /> 
       <input type = "hidden" name = "uid" value = "<?= $uid?>">
        <input type ="submit" name="submit" class ="btn"  value = "Place Order Now"> &nbsp; <a class = "btn2" onclick = "return del();" style = "text-decoration: none; font-size : 12px;" href="logout.php" >Clear Shopping Cart</a>

    <?php 
          
    }else{ 
          
        echo '<script>alert("Your Cart is empty. Please add some products. you will be redirected to Shopping page!"); window.location = "/projekweb/index.php";</script><p></p>'; 
          
    } 
  
?>

		


</form>
</div>
</body>
</html>