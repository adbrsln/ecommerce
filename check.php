<?php 
include 'include/db.php';
$transid = $_POST["transid"];
if (isset($_POST["transid"])) {
   	
	$query="SELECT corder.item_id, corder.qty as qty , corder.total as subtotal, corder.ftotal as total, item.itemName as itemname,item.num FROM corder join item on corder.item_id = item.num WHERE transactionid = '$transid'";
	$result=mysqli_query($connect,$query); 

	$query2="SELECT DISTINCT ftotal FROM corder WHERE transactionid = '$transid'";
	$result2=mysqli_query($connect,$query2); 
	while($row3 = mysqli_fetch_assoc($result2)){
		$ftotal = $row3['ftotal'];
	}
}else{

}
	
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
<h1></h1>
<form method = "POST" action ="check.php">
	<div id = "mesej"></div>
	<table class = "tbl">
			<tr>
	 		<td colspan = "4"><div class = "card" ><center>Input your Transaction ID below to check your order<br><br><input type ="text" class= "input2" style="width:60%" name ="transid" value ="<?=$transid?>"><br><input type="submit" class ="btn" value ="Check Transaction ID"></td></center></div>
	 	</tr>
		<tr>
			<th>Item</th>
			<th>Quantity</th>
			<th>Price per unit</th>
			<th>Price</th>
		</tr>
		<?php while($row2 = mysqli_fetch_assoc($result)){  
			$ppunit = $row2['subtotal']/$row2['qty'];
			?>
		<tr>
			<td><?php echo $row2['itemname']; ?></td>
			<td><?php echo $row2['qty']; ?></td>
			<td><?php echo $ppunit; ?></td>
			<td><?php echo $row2['subtotal']; ?></td>

		</tr>
		<?php  }  ?> 
		</hr>
		<tr>
        

        <th colspan = "">
        
            Total you have to pay :<strong>RM <?= $ftotal?></strong>
           
            
        </th>
        <td></td>
        <td></td>
         <td></td>
    </tr>
	</table>
</form>
</div>
</body>
</html>