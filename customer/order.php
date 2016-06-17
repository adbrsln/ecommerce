<?php 
include '../include/db.php';
$transid = $_GET["id"];
if (isset($_GET["id"])) {
   
   $query3="SELECT distinct corder.imglink as imglink,corder.status as status, details.name as name,details.address as address , details.notel as notel FROM corder join details on corder.user_id = details.num WHERE corder.transactionid = '$transid'"; //index details
	$result3 =mysqli_query($connect,$query3);
	$count = mysqli_num_rows($result3);

			
	if ($count > 0){
		$query="SELECT corder.item_id, corder.qty as qty , corder.total as subtotal, corder.ftotal as total, item.itemName as itemname,item.num FROM corder join item on corder.item_id = item.num WHERE transactionid = '$transid'";
		$result=mysqli_query($connect,$query); 

		$query2="SELECT DISTINCT ftotal,status FROM corder WHERE transactionid = '$transid'";
		$result2=mysqli_query($connect,$query2); 
		while($row3 = mysqli_fetch_assoc($result2)){
			$ftotal = $row3['ftotal'];
			$status = $row3['status'];
		}

	}
		else {
			 echo '<script>window.location = "/projekweb/customer/index.php?e=f";</script>'; 
		}
	
}
	
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="../include/style.css">
	<script>
		function del(){
		var r = confirm("Are you sure to cancel this record?");
			if (r == true) {
			   return true;
			} else {
			   return false;
			}
		}
	</script>
</head>

<body >
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; ?>

<div class="content">
<h1></h1>
<form method = "POST" action ="index.php">
	<div id = "mesej"></div>
	<table class = "tbl">
			<tr>
	 		<td colspan = "4"><div class = "card" ><center>Input your Transaction ID below to check your order<br><br><input type ="text" class= "input2" style="width:60%" name ="transid" value ="<?=$transid?>"><br><br><input type="submit" class ="btn" value ="Check Transaction ID"></td></center></div>
	 	</tr>
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

				<td height="200" ><div class= "card">
				<?php 
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
        
            Total you have to pay :<strong>RM <?= $ftotal?></strong>
           
            
        </th>
        <td></td>
        <td></td>
         <td></td>
    </tr>
	</table>
	<br>
	
<a  style = "text-decoration:none; font-size :12px" class = "btn" href="/projekweb/customer/status.php?id=<?=$transid;?>" >Proceed With Payment Confirmation</a>
&nbsp;<a  style = "text-decoration:none; font-size :12px" onclick = "return del();" class = "btn2" href="/projekweb/customer/payproses.php?id=<?=$transid;?>&type=cancel&status=<?=$status?>" >Cancel Order</a>
 </form>
</div>
</body>

</html>