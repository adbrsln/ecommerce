<?php session_Start();?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="../include/style.css">
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "./include/header_navbar.php"; ?>

<div class="content">
<h1>Receipt for reference</h1>
<form method = "POST" action ="p_proses.php">
	 Save your <strong>Transaction ID</strong> below for order reference :<br> <br><div class = "card" style ="text-align:center;"><h2 onClick="this.setSelectionRange(0, this.value.length)"><?= $_GET["ses"]?></h2></div>
	 </br>
	 Double click above transaction id to Select all. ^ and paste the transaction ID <a style="text-decoration:none;" href = "index.php">Over here</a><?php unset($_SESSION['cart']); session_regenerate_id();?>
</form>
</div>
</body>
</html>