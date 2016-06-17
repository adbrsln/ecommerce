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
<form method = "POST" action ="customer/index.php">
	 <table style="margin-left : 50px">
	 	
	 	<tr><td><h2>Featured Product</h2></td></tr>
	 	<tr>
		 	<td><center><div class = "card"><a href = "item.php?cat=Science" ><img src="image/b2.png" alt="" height="200" width="200"></a><br><br>Electrical And Engineering<br><br><br><button class ="btn" href="item.php?cat=Science" >More</button></div></center></td>
		 	<td><center><div class = "card"><a href = "item.php?cat=Accounting" ><img src="image/b3.png" alt="" height="200" width="200"></a><br><br>Space And Theories<br><br><br><button class ="btn" href="item.php?cat=Accounting" >More</button></div></center></td>
		 	<td><center><div class = "card"><a href = "item.php?cat=Space" ><img src="image/b2.png" alt="" height="200" width="200"></a><br><br>The Space and Beyond<br><br><br><button class ="btn" href="item.php?cat=Space" >More</button></div></center></td>	
		 	<td><center><div class = "card"><a href = "item.php?cat=Space" ><img src="image/b8.png" alt="" height="200" width="200"></a><br><br>Count in Math<br><br><br><a href="item.php?cat=Space"><button class ="btn"  >More</button></a></div></center></td> 	
		</tr>
	 	
	 </table>
</form>
</div>
</body>
</html>