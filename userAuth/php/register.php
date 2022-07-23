<?php
if(isset($_POST['submit'])){
   $username = $_POST['fullname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
registerUser($username, $email, $password);
}
function registerUser($username, $email, $password){

   $form_data = array(
       'fullname' => $username,
       'email' => $email,
       'password' => $password );
   $exist = checkIfUserExist($email);
   if($exist){
       echo "User already exist";
   }else{
       $file = fopen('../storage/users.csv', 'a');
       fputcsv($file, $form_data);
       fclose($file);
       echo "User registered";
   }}
function checkIfUserExist($email){
       $file = fopen('../storage/users.csv', 'r');
       while(!feof($file)){
          $line = fgetcsv($file); 
           if($line[1] == $email){
               return true;
           }
       }
       fclose($file);
       return false;
   }