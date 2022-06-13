<?php include('user_data.php') ?>
<!DOCTYPE html>
<html>
 <head>
  <title>Registration</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Registration</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Full Name</label>
      <input type="text" name="fullname" placeholder="Enter Name" class="form-control" value="<?php echo $fullname; ?>" />
     </div>
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="date" class="form-control"  value="<?php echo $date; ?>" />
     </div>
     <div class="form-group">
        <p>Select Your Gender</p>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="error">* <?php echo $error;?></span>     
    </div>
     <div class="form-group">
      <label>Country</label>
      <input type="text" name="country" placeholder="Kenya" class="form-control" value="<?php echo $country; ?>" />
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>