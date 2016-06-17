<ul class = "nav" >

	<li><a href="index.php"  class="active">Kedai Buku Online</a></li>
	<?php
	include 'db.php';
	$sql2 = "Select * from category" ;
	$result2 = mysqli_query($connect,$sql2);
	while($row2 = mysqli_fetch_assoc($result2)){ ?>
	<li><a href="item.php?cat=<?= $row2['name'];?>"><?= $row2['name'];?></a></li>
	<?php  }  ?> 
	<li><a href="customer/cart.php">Cart</a></li>
        <li><a href="contact.php">Contact Us</a></li>
	<li style="float:right"><a class="active" href="staff/index.php">Login</a></li>
</ul>
	