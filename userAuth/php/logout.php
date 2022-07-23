<?php
function logout(){
  
   session_start();
   if($_SESSION){
       session_destroy();
       header('Location: ../index.php');
   }
 
   else{
       echo "You are not logged in";

   }
   /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
}
 
logout();
 