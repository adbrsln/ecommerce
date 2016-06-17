
<?php
include 'include/check.php';
include '../include/db.php';


$n = ucwords(strtolower($_POST['nama']));
$u = strtolower($_POST['user']);
$p = $_POST['pass'];
$l = $_POST['level'];
$n1 = $_POST['num'];




$query="SELECT * FROM login WHERE nama = '$n'";
$result=mysqli_query($connect,$query);
$num=mysqli_num_rows($result);

if($n1 != 0)
{ 
		if ($p != ''){

		$encrypted_mypassword = md5($p);
		$query = "UPDATE login set nama = '$n' , username = '$u' , password = '$encrypted_mypassword' , level = '$l' where num = $n1";
		mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");
		$query = "FLUSH PRIVILEGES";
		echo '<meta http-equiv="refresh" content="0;url=/projekweb/admin/index.php?s=u">'; 
		
		}else{
			$query = "UPDATE login set nama = '$n' , username = '$u' , level = '$l' where num = $n1";
		mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");
		$query = "FLUSH PRIVILEGES";
		echo '<meta http-equiv="refresh" content="0;url=/projekweb/admin/index.php?s=t">'; 
		
		}
		
}
else
		{
		$encrypted_mypassword = md5($p);
		$query = "INSERT INTO login (nama, username, password, level) VALUES ('$n', '$u', '$encrypted_mypassword', '$l')";
		mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");
		$query = "FLUSH PRIVILEGES";
		
		echo '<meta http-equiv="refresh" content="0;url=/projekweb/admin/index.php?s=true">'; 

		}



?>