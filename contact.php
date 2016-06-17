<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="/projekweb/include/style.css">
  <script>
function complete(){
alert('your enquiry has been notified by admin');
}
</script>
</head>

<body>
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header_navbar.php"; //include($_SERVER['DOCUMENT_ROOT'].'/../include/header_navbar.php');?>

<div class="content">
<h1>Contact Us </h1>

<div class="card">
	<form method="POST" action = "#" >
	
    Name</br>
       <input class="input"  type="text" name = "nama" value = ""  required>
        </br>
    
     Email Address </br>
       <input class="input"  type="address" name = "eaddress"  value = ""required>
         </br>
     Enquiry </br>
      <textarea class ="input" name = "enq" height = "250"></textarea> </br>

	
    
         <input class="btn" type ="submit"  class  = "btn" name = "submit" id ="submit" onclick ="complete()" value="Hantar">
   </form>
  </div>
</div>
</body>
</html>		