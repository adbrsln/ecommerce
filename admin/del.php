<?php session_start();?>
<?php
include 'include/check.php';
include '../include/db.php';
$num = $_GET['id'];

$query = "DELETE FROM login WHERE num = '$num'";
		

mysqli_query($connect,$query) or die('Penghapusan Akaun Pengguna GAGAL. Tiada Pengguna Dapat Dipadamkan.');
$query = "FLUSH PRIVILEGES";
echo '<meta http-equiv="refresh" content="0;url=/projekweb/admin/index.php?s=p">'; 
//include 'files/closedb.php';	

?>
