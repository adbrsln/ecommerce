
<?php
include 'include/check.php';
include '../include/db.php';


$i = $_POST["id"];
$n = $_POST['itemname'];
$p = $_POST['itemprice'];
$d = $_POST['desc'];
$c = $_POST['category'];




$query="SELECT * FROM item WHERE num = '$i'";
$result=mysqli_query($connect,$query);
$num=mysqli_num_rows($result);

if($num != 0)
{ 
    
    $query = "UPDATE item set itemName = '$n' , itemPrice = '$p' , itemDesc = '$d' , categ = '$c' where num = $i";
    mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");;
    $query = "FLUSH PRIVILEGES";
    echo '<meta http-equiv="refresh" content="0;url=/projekweb/staff/list.php">'; 
}
else
    {
 
    $query = "INSERT INTO item (itemName,itemPrice,itemDesc,categ) VALUES ('$n', '$p', '$d', '$c')";
    mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");;
    $query = "FLUSH PRIVILEGES";
    
    
    echo '<meta http-equiv="refresh" content="0;url=/projekweb/staff/list.php">'; 

    }



?>