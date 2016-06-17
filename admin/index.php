<?php 
include 'include/check.php';
include '../include/db.php';
$num_rec_per_page=10;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql2 = "SELECT * FROM login LIMIT $start_from, $num_rec_per_page";
$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="include/style.css">
	<script>
		function del(){
		var r = confirm("Are you sure to delete this record?");
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
	<h1>List Login Credentials</h1>
	<p>This is the menu for Login credentials and more</p>
	<div class="card">
	<table class="tbl">
	  <tr>
		
		<th>Name</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Action</th>
	  </tr>
	 <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
	  <tr>
		
		<td><?php echo $row2['nama']; ?></td>
		<td><?php echo $row2['username']; ?></td>
		<td><?php echo $row2['password']; ?></td>
		<td><?php echo $row2['level']; ?></td>
		<td><a  class = "btn" style="text-decoration:none;font-size:12px;" href="/projekweb/admin/edit.php?id=<?=$row2['num'];?>" >Update</a>&nbsp;<a  style="text-decoration:none;font-size:12px;" onclick = "return del();" class = "btn2" href="/projekweb/admin/del.php?id=<?=$row2['num'];?>" >Delete</a></td>
	  </tr>
	 <?php  }  ?> 
	</table>
	<?php 
				$sql = "SELECT distinct num FROM login"; 
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