<?php
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
 
   resetPassword($email, $password);
}
 
function resetPassword($email, $password){
   $file = fopen('../storage/users.csv', 'r');
   while(!feof($file)){
       $line = fgetcsv($file);
       if($line[1] == $email){
           $line[2] = $password;
           $file = fopen('../storage/users.csv', 'w');
           fputcsv($file, $line);
           echo "<h2 style='color: green'>Password Succesfully Modified <br> <a href='../forms/login.html'>Login Here</a></h2>";
           fclose($file);
           exit();
       }

    }
    echo "<h2 style='color: red'>Email not found</h2>";
   //open file and check if the username exist inside
   //if it does, replace the password
}
