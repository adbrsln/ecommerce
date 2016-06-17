<?php include 'include/check.php';?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="include/style.css">
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; //include($_SERVER['DOCUMENT_ROOT'].'/../include/header_navbar.php');?>

<div class="content">
<h1>Pendaftaran Ahli Baharu</h1>
<div class="card">
	<form method="POST" action = "reg_user.php">
	
    Name</br>
       <input class="input"  type="text" name = "nama"  required>
        </br>
    <a>Username</a> </br>
       <input class="input"  type="text" name = "user"  required>
         </br>
	<a>Password</a></br>  
       <input class="input"  type="password" name = "pass"  required></a>
         </br>
	<a>Credential type</a></br>  
        <select class ="input" name = "level">
        	<option value = "1">Admin</option>
        	<option value = "2">User</option>
        </select>
		</br></br>
	
   
    
         <input class="btn" type ="submit" class  = "btn" name = "submit" id ="submit" value="Hantar">
   </form>
  </div>
</div>
</body>
</html>