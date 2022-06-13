<?php
//index.php

$error = '';
$fullname = '';
$email = '';
$date = '';
$gender = '';
$country = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["fullname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $fullname = clean_text($_POST["fullname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$fullname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["country"]))
 {
  $error .= '<p><label class="text-danger">Country is required</label></p>';
 }
 else
 {
  $country = clean_text($_POST["country"]);
 }
 if(empty($_POST["date"]))
 {
  $error .= '<p><label class="text-danger">Date is required</label></p>';
 }
 else
 {
  $date = clean_text($_POST["date"]);
 }
 if (empty($_POST["gender"])) 
 {
    $error .= '<p><label class="text-danger">Gender is required</label></p>';
 } 
 else 
 {
    $gender = clean_text($_POST["gender"]);
 }

 if($error == '')
 {
  $file_open = fopen("user_data.csv", "a");
  $no_rows = count(file("user_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'fullname'  => $fullname,
   'email'  => $email,
   'date' => $date,
   'gender' => $gender,
   'country' => $country,
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for registering with us</label>';
  $fullname = '';
  $email = '';
  $date = '';
  $gender = '';
  $country = '';
 }
}

?>