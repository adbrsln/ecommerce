//update
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<head>
	<link rel="stylesheet" href="include/style.css">
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
<h1>Register</h1>
<div class="card">
	<form method="POST" action = "reg_proses.php" onsubmit= "return agree()">
	
    Name</br>
       <input class="input"  type="text" name = "nama"  required>
        </br>
    Username </br>
       <input class="input"  type="text" name = "user"  required>
         </br>
	Password</br>  
       <input class="input"  type="password" name = "pass"  required></a>
         </br>
	
		
	<input type = "hidden" name = "level" value = "3" >
   <input type = "checkbox" id ="agreet" value = "1"> Hereby i agree with all the terms and conditions .</br></br>
    
         <input class="btn" type ="submit"  class  = "btn" name = "submit" id ="submit" value="Hantar">
   </form>
  </div>
</div>
</body>
</html>