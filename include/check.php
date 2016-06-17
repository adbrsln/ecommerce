<?php session_Start(); ?>
<?Php

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['usernamela'])) {
       
     
      header('Location: /projekweb/main.php');
      }
else{
switch ($_SESSION['levella']) {
        case 1:
           
          header('Location: /projekweb/admin'); // admin Level;
          break;
        case 2:
           
          header('Location: /projekweb/staff'); // admin Level;
          break;
         
      }
}
?> 