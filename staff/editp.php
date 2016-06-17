<?php 
include 'include/check.php';
include '../include/db.php';
$transid = $_GET["id"];
if (isset($_GET["id"])) {
   	
	$query="SELECT  corder.item_id, corder.qty as qty , corder.total as subtotal, corder.ftotal as total, item.itemName as itemname,item.num FROM corder join item on corder.item_id = item.num WHERE transactionid = '$transid'";
	$result=mysqli_query($connect,$query); 

	$query3="SELECT DISTINCT name,notel,address,status,imglink FROM corder WHERE transactionid = '$transid'";
	$result3=mysqli_query($connect,$query3); 

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
	<link rel="stylesheet" href="../include/style.css">
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; ?>

<div class="content">
<h1>Order : <?=$transid?></h1>

	<div id = "mesej"></div>
	<table class = "tbl">
			<tr>

			<?php while($row2 = mysqli_fetch_assoc($result3)){  
			
			?>
	 		<td colspan = "3" height="200"><div class= "card">
	 		<Strong>Customer Order Information</Strong></br></br>
	 			Status :   <Strong><?php echo $row2['status']; ?></Strong></br>
				Name :<?php echo $row2['name']; ?></br>
				Phone Number : <?php echo $row2['notel']; ?></br>
				Address : <?php echo $row2['address']; ?></br>
				</td></div>

				<td height="200" ><div class= "card"><?php 
           			 if ($row2['imglink'] != null) { 
           			 	echo '<center><img src="../customer/uploads/' ; 
           			 	echo $row2['imglink']; 
           			 	echo '" href="../customer/uploads/'; 
           			 	echo $row2['imglink']; 
           			 	echo '" height="115" width="200"></center>';
           			 } else { 
           			 	echo '<center><img src="../image/avatar.png" alt="" height="115" width="200"></center>';
           			 }
           			  ?>
           		 </div></td>
				<?php  }  ?>
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
        
            Total customer has to pay :<strong>RM <?= $ftotal?></strong>
           
            
        </th>
        <td></td>
        <td></td>
         <td></td>
    </tr>
	</table>
	<br><br>
	<form method = "POST" action ="">
	 <a style = "text-decoration : none;" class ="btn" href = "proses.php?id=<?=$transid?>&type=confirm" value = "btn">Confirmed Order</a>&nbsp; 
	 <a  style = "text-decoration : none;" class ="btn" href = "proses.php?id=<?=$transid?>&type=complete" value = "btn">Order Complete</a>&nbsp;
	 <a  style = "text-decoration : none;" class ="btn2" href = "proses.php?id=<?=$transid?>&type=cancel">Canceled Order</a>

</form>
</div>
</body>
</html>