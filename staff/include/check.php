<?php session_Start(); ?>
<?Php

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['usernamela'])) {
       
     
      header('Location: /projekweb/staff/main.php');
      }
else{
switch ($_SESSION['levella']) {
        case 1:
           
          header('Location: /projekweb/admin/index.php'); // admin Level;
          break;
        
         case 3:
           
          header('Location: /projekweb/customer/index.php'); // admin Level;
          break;
        
      }
}
?> 