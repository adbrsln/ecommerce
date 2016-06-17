<?php
//include 'include/check.php';
include '../include/db.php';
  $i = $_GET["id"]; 
  if (isset($_GET["s"])) { 
    if ($_GET["s"] == 't'){
    echo "<script type='text/javascript'>alert('Success! Wait for our Staff Confirmation');</script>" ;
    }else
    echo "<script type='text/javascript'>alert('Fail to upload image!');</script>" ;
  } ;
   
  
$query="SELECT distinct corder.ftotal as ftotal ,corder.imglink as imglink,corder.status as status, details.name as name,details.address as address , details.notel as notel FROM corder join details on corder.user_id = details.num WHERE corder.transactionid = '$i'";
  $result=mysqli_query($connect,$query);

 
  

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<head>
  <link rel="stylesheet" href="../include/style.css">
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; ?>
<
<div class="content">
<h1>Customer order </h1>


<?php while($row2 = mysqli_fetch_assoc($result)){ ?>
<div class="card">
  
  <table >
   <tr>
     <td style = "width:40%;vertical-align: top;" width ="50%">
        <h4>Customer's name</h4> 
           <?php echo $row2['name']; ?>
             </br></br>
        <h4>  Customers Address</br></h4>   
               <?php echo $row2['address']; ?>
                 </br></br>
          <h4>Customer's Phone number</br> </h4>  
               <?php echo $row2['notel']; ?>
                 </br></br>
       
           <h4>Total Payment</br>  </h4> 
               RM <?php echo $row2['ftotal']; ?>
                 </br></br>
     </td>

     <td style = "vertical-align: top; " width ="50%" >
     Please upload your bank transfer payment receipt for our reference and after that we would confirmed your order and send out your item . 
         
         <form action="upload.php" method="post" enctype="multipart/form-data">
            <br><br>Select image to upload:
            <input type="file" name="fileToUpload"  id="fileToUpload">
            <input type="submit" class = "btn" value="Upload Image" name="submit">
            <input type ="hidden" name ="id" value = "<?= $i; ?>"></form><br>
          
         <?php 
                 if ($row2['imglink'] != null) { 
                  echo '<center><img src="../customer/uploads/' ; 
                  echo $row2['imglink']; 
                  echo '" href="../customer/uploads/'; 
                  echo $row2['imglink']; 
                  echo '" height="200" width="200"></center>';
                 } else { 
                  echo '<center><img src="../image/avatar.png" alt="" height="200" width="200"></center>';
                 }
                  ?>
        <?php }  ?>
     </td>
     
    </tr> 

  </table>
    
<form method="POST" action = "payproses.php">
       
         <input type ="hidden" name ="img" value = "<?php echo $_GET["img"]; ?>">
         <input type ="hidden" name ="tid" value = "<?php echo $_GET["id"]; ?>" >
         <input class="btn" type ="submit" class  = "btn" name = "submit" id ="submit" value = "Confirm order">&nbsp;
        
         <input class="btn2" type ="button" class  = "btn"  onclick ="goBack()" value="Back to menu">
   
</form>  

   </div>
</div>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>

</html>