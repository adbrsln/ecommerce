<?php
include 'include/check.php';
include '../include/db.php';
$num = $_GET['id'];
$sql = "SELECT * FROM login where num = '$num'";
$result = mysqli_query($connect,$sql);


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
<h1>Pengubahan data pengguna</h1>
<div class="cardlo">
<?php while($row2 = mysqli_fetch_assoc($result)){ ?>
	<form method="POST" action = "reg_user.php">
	
    Name</br>
       <input class="input"  type="text" name = "nama"  required value="<?=$row2['nama']; ?>" >
        </br>
    <a>Username</a> </br>
       <input class="input"  type="text" name = "user"   required value ="<?=$row2['username']; ?>">
         </br>
	<a>Password</a></br>  
       <input class="input"  type="password" name = "pass" ></a>
         </br>
	<a>Type</a></br>  
        <select class ="input" name = "level">
        <option value = "<?php echo $row2['level'] ; if ($row2['level'] ==1){ $t = 'Admin';}else{$t = 'User'; }; ?>"><?=$t?></option>
        	<option value = "1">Admin</option>
        	<option value = "2">Staff</option>
        	<option value = "3">Customer</option>
        </select>
		</br></br>
	<input type="hidden" name = "num" value = "<?=$row2['num']; ?>" >
   <?php  }  ?>
        
         <input class="btn" type ="submit" class  = "btn" name = "submit" id ="submit" value="Hantar">
   </form>
  </div>
</div>
</body>
</html>