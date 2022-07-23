<?php
session_start();
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
loginUser($email, $password);
}
function loginUser($email, $password){
   //open file in read mode
   $file = fopen('../storage/users.csv', 'r');
   //read the file line by line
   while(!feof($file)){
       $line = fgetcsv($file);
       //check if the email and password match
       if($line[1] == $email && $line[2] == $password){
           //if they do, set the session variable
           $_SESSION['username'] = $line[0];
           //redirect to dashboard
           header('Location: ../dashboard.php');
       }   }
   //if the email and password don't match, redirect to login page
   echo "<h2 style='color: red'> Invalid username or password </h2>";
   //close the file
   fclose($file);
   /*
       Finish this function to check if username and password
   from file match that which is passed from the form
   */
}
