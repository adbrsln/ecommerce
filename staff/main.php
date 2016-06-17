<?php session_Start(); 

if (isset($_SESSION['usernamela'])) {
		   
			header('Location: /projekweb/index.php');
			}?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<link rel="stylesheet" href="/projekweb/include/style.css">
</head>

<body style="background-image:url('image/kucang.jpg');">

<?php include "include/header_navbar2.php"; ?>

	<div class="card" style="margin:auto;width:600px;margin-top:100px;">
		<form method="post" action="loginproc.php">
			
			<label>Username</label>
			<input class="input" type="text" name ="username" required><br>
			<label>Login</label>
			<input class="input" name="password" type="password" required><br>
			Not registered yet? click <strong><a href="/projekweb/register.php">here</a></strong><br><br>
	
			<input class="btn" type="submit" value="Login"><br>
			
			
		</form>
	</div> 
</body>
</html>