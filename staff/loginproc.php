<?php
session_start();
include '../include/db.php';

// Retrieve username and password from database according to user's input
$username=mysqli_real_escape_string($connect,$_POST['username']);
$password=mysqli_real_escape_string($connect,$_POST['password']);
$encrypted_mypassword=md5($password);
$sql = "SELECT * FROM login WHERE (username = '$username') and (password = '$encrypted_mypassword')";
$login = mysqli_query($connect,$sql);
$count = mysqli_num_rows($login) ;


// Check username and password match

 while($row = mysqli_fetch_assoc($login)){
					$_SESSION['usernamela'] = $username;
					$_SESSION['namela'] = $row['nama'];
					$_SESSION['levella'] = $row['level'];
					
					$name = $_SESSION['namela'];
					$sql2 = "SELECT * FROM details WHERE (name = '$name')";
					$login2 = mysqli_query($connect,$sql2);
					while($row = mysqli_fetch_assoc($login2)){
					$_SESSION['coname'] = $name;
					$_SESSION['address'] = $row['address'];
					$_SESSION['cnum'] = $row['loginID'];
					$_SESSION['notel'] = $row['notel'];
				}

					$type = $_SESSION['levella'];
				}

 if ($count != "") {
 
			switch ($type) {
				case 1:
				 	 
					header('Location: /projekweb/admin'); // admin Level;
					break;
				case 2:
				 			
				
					header('Location: /projekweb/staff/index.php');
					break;
				case 3:

					
					header('Location: /projekweb/customer/index.php');
					break;
			   
			}
			
			
		
}
else {
// Jump to login page

header('Location:/projekweb/staff/main.php');

}   




?>