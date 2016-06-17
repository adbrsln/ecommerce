
<?php
include '/include/db.php';


$n = ucwords(strtolower($_POST['nama']));
$u = strtolower($_POST['user']);
$p = $_POST['pass'];
$l = $_POST['level'];





$query="SELECT * FROM login WHERE username = '$u'";
$result=mysqli_query($connect,$query);
$num=mysqli_num_rows($result);

if($n1 != 0)
{ 
		echo "this username has been taken! try again!";
		echo '<script>window.history.go(-1);</script>'; 
		
		
}
else
		{
		$encrypted_mypassword = md5($p);
		$query = "INSERT INTO login (nama, username, password, level) VALUES ('$n', '$u', '$encrypted_mypassword', '$l')";
		mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");
		$query = "FLUSH PRIVILEGES";

		$query = "INSERT INTO details (nama) VALUES ('$n')";
		mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");
		$query = "FLUSH PRIVILEGES";
		
		echo '<meta http-equiv="refresh" content="0;url=/projekweb/staff/main.php?s=true">'; 

		}



?>