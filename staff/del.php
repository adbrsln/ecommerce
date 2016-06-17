<?php session_start();?>
<?php
include 'include/check.php';
include '../include/db.php';
$num = $_GET['id'];
$type = $_GET['t'];

if ($type != 'c'){
$query = "DELETE FROM item WHERE num = '$num'";
mysqli_query($connect,$query) or die('Penghapusan Akaun Pengguna GAGAL. Tiada Pengguna Dapat Dipadamkan.');
$query = "FLUSH PRIVILEGES";
echo '<meta http-equiv="refresh" content="0;url=/projekweb/staff/list.php?s=p">'; 
//include 'files/closedb.php';	
}else{
$query = "DELETE FROM category WHERE num = '$num'";
mysqli_query($connect,$query) or die('Penghapusan Akaun Pengguna GAGAL. Tiada Pengguna Dapat Dipadamkan.');
$query = "FLUSH PRIVILEGES";
echo '<meta http-equiv="refresh" content="0;url=/projekweb/staff/clist.php?s=p">'; 
}
?>
