<?php 

include 'include/check.php';
include '../include/db.php';

$num = $_SESSION['cnum'];
$sql = "SELECT * from details where loginID = '$num'";
$result = mysqli_query($connect,$sql);


?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="/projekweb/include/style.css">
  <script type="text/javascript">
    function agree(){
      if(document.getElementById('agreet').checked) {
        return true;
        }else{ 
           alert('Check the agree button first pls!');
          return false;

        }
    }


  </script>
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; //include($_SERVER['DOCUMENT_ROOT'].'/../include/header_navbar.php');?>

<div class="content">
<h1>User Details</h1>

<div class="card">
	<form method="POST" action = "edit_proses.php" >
	<?php while($row2 = mysqli_fetch_assoc($result)){ ?>
    Name</br>
       <input class="input"  type="text" name = "nama" value = "<?=$row2['name']; ?>"  required>
        </br>
    
     Address </br>
       <input class="input"  type="address" name = "address"  value = "<?=$row2['address']; ?>"required>
         </br>
     Phone Number </br>
       <input class="input"  type="notel" name = "notel" value = "<?=$row2['notel']; ?>" required>
         </br>

	<input type="hidden" name = "id" value = "<?=$num?>">		
	
    <?php  }  ?>
         <input class="btn" type ="submit"  class  = "btn" name = "submit" id ="submit" value="Hantar">
   </form>
  </div>
</div>
</body>
</html>