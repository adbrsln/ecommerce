<?php 
session_start();
include '../include/db.php';
$num_rec_per_page=10;
$id = $_SESSION['cnum'];
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql2 = "SELECT DISTINCT corder.transactionid,corder.ftotal,corder.status,details.loginID,login.nama as name FROM corder join details on corder.user_id = details.num join login on details.loginID = login.num WHERE details.loginID = $id LIMIT $start_from, $num_rec_per_page";
$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="/projekweb/include/style.css">
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; ?>

<div class="content">
		
	<h1>List <?=$_SESSION['namela'];?> Order</h1>
	
	<div class="card">
	<table class="tbl">
	  <tr>
		<th>Transaction ID</th>
		<th>Name</th>
		<th>Total</th>
		<th>Status</th>
		<th>Action</th>
	  </tr>
	 <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
	  <tr>
		<td><?php echo $row2['transactionid']; ?></td>
		<td><?php echo $row2['name']; ?></td>
		<td><?php echo $row2['ftotal']; ?></td>
		<td><?php echo $row2['status']; ?></td>
		<td><a  class = "btn" style="text-decoration:none;font-size:12px;" href="order.php?id=<?=$row2['transactionid'];?>" >Update</a></td>
	  </tr>
	 <?php  }  ?> 
	</table>
	<?php 
				$sql = "SELECT distinct transactionid FROM corder"; 
				$rs_result = mysqli_query($connect,$sql); //run the query
				$total_records = mysqli_num_rows($rs_result);  //count number of records
				$total_pages = ceil($total_records / $num_rec_per_page); 
				
				echo '<ul class="w3-pagination">'; 
				
				
				
				echo '<li><a href="index.php?page=1">&laquo;</a></li>';
				for ($i=1; $i<=$total_pages; $i++) { 
						
							 echo "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
				}; 
		echo "<li><a href='index.php?page=$total_pages'>&raquo;</a></li>";
				echo "</ul>";
			?>
</div></div>
</body>
</html>